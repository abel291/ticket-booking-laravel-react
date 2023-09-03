import Button from '@/Components/Button';
import ButtonSecondary from '@/Components/ButtonSecondary';
import FormGrid from '@/Components/Form/FormGrid';
import InputFileLabelError from '@/Components/Form/InputFileLabelError';
import InputLabelError from '@/Components/Form/InputLabelError';
import SelectActive from '@/Components/Form/SelectActive';
import SelectLabelError from '@/Components/Form/SelectLabelError';
import TextareaTrix from '@/Components/Form/TextareaTrix';
import Input from '@/Components/Input';
import InputError from '@/Components/InputError';
import Label from '@/Components/Label';


import ManagerLayout from '@/Layouts/ManagerLayout';
import { PhotoIcon, UserCircleIcon } from '@heroicons/react/24/solid';
import { Link, useForm } from '@inertiajs/react';
import React from 'react'

const EventsCreate = ({ categories, locations, event = {}, edit }) => {
    const { setData, data, post, put, processing, errors } = useForm({
        title: event.title || "",
        slug: event.slug || "",
        active: event.active || "",
        duration: event.duration || "",
        entry: event.entry || "",
        description: event.description || "",
        sub_category_id: event.sub_category_id || "",
        location_id: event.location_id || "",
        banner: null,
        card: null,
        img: null,
    });

    const handleSubmit = (e) => {
        e.preventDefault()
        if (edit) {
            put(route('manager.events.update', event.id))
        } else {
            post(route('manager.events.store'))
        }

    }
    const handleChange = (e) => {
        e.preventDefault()
        let target = e.target
        let value = null;
        switch (target.type) {
            case 'file':
                value = target.files[0]
                console.log(target.files);
                break;

            default:
                value = target.value
                break;
        }
        setData(e.target.name, value)
    }

    return (
        <ManagerLayout title="Crear Eventos">

            <div className="max-w-3xl ">
                <form onSubmit={handleSubmit}>
                    <div className="space-y-12">
                        <div className="border-b border-gray-900/10 pb-12">
                            <h2 className="text-base font-semibold leading-7 text-gray-900">Datos Basicos</h2>
                            <p className="mt-1 text-sm leading-6 text-gray-600">
                                Esta información se mostrará públicamente, así que tenga cuidado con lo que comparte.
                            </p>

                            <FormGrid>
                                <div className="sm:col-span-3">
                                    <InputLabelError handleChange={handleChange} errors={errors.title} label="Titulo" name="title" value={data.title} />
                                </div>
                                <div className="sm:col-span-3">
                                    <InputLabelError handleChange={handleChange} errors={errors.slug} label="URL" name="slug" value={data.slug} />
                                </div>
                                <div className="sm:col-span-2">
                                    <InputLabelError handleChange={handleChange} errors={errors.duration} label="Duracion" name="duration" value={data.duration} />
                                </div>
                                <div className="sm:col-span-3">
                                    <SelectLabelError handleChange={handleChange} errors={errors.sub_category_id} label="Categorias" name="sub_category_id" value={data.sub_category_id}>
                                        <>
                                            <option value="">Seleccione un Opcion</option>
                                            {categories.map((category) => (
                                                <optgroup key={category.id} label={category.name}>
                                                    {category.subCategories.map((subCategory) => (
                                                        <option key={subCategory.id} value={subCategory.id}>{subCategory.name}</option>
                                                    ))}
                                                </optgroup>
                                            ))}
                                        </>
                                    </SelectLabelError>
                                </div>
                                <div className="sm:col-span-full">
                                    <SelectLabelError handleChange={handleChange} errors={errors.location_id} label="Recintos" name="location_id" value={data.location_id}>
                                        <>
                                            <option value="">Seleccione un Opcion</option>
                                            {locations.map((location) => (
                                                <option key={location.id} value={location.id}>{location.name} {location.address}</option>
                                            ))}
                                        </>
                                    </SelectLabelError>
                                </div>
                                <div className="sm:col-span-full">
                                    <InputLabelError handleChange={handleChange} errors={errors.entry} label="Descripcion corta" name="entry" value={data.entry} />
                                </div>

                                <div className="sm:col-span-full">
                                    <Label forInput="description" value="Descripcikon larga" />
                                    <div className="mt-1">
                                        <TextareaTrix
                                            className="mt-1"
                                            id="trixEditor"
                                            value={data.description}
                                            handleChange={(html, text) => (setData('description', html))}
                                        />
                                    </div>
                                    <InputError message={errors.description} className="mt-2" />
                                </div>
                                <div className="sm:col-span-2">
                                    <SelectActive handleChange={handleChange} errors={errors.active} value={data.active} name="active" />
                                </div>

                            </FormGrid>
                        </div>
                        <div className="border-b border-gray-900/10 pb-12">
                            <h2 className="text-base font-semibold leading-7 text-gray-900">Imagenes</h2>

                            <FormGrid>
                                <div className="col-span-5">
                                    <InputFileLabelError img={event.banner} handleChange={handleChange} label="Banner" name="banner" errors={errors.banner} />
                                </div>
                                <div className="col-span-5">
                                    <InputFileLabelError img={event.card} handleChange={handleChange} label="Card" name="card" errors={errors.card} />
                                </div>
                                <div className="col-span-5">
                                    <InputFileLabelError img={event.thum} handleChange={handleChange} label="Thum" name="thum" errors={errors.thum} />
                                </div>
                            </FormGrid>

                        </div>
                    </div>
                    <div className="mt-6 flex items-center justify-end gap-x-3">
                        <Link className="btn btn-secondary" href={route('manager.events.index')}>
                            Cancelar
                        </Link>
                        <Button processing={processing}>
                            Guardar
                        </Button>
                    </div>
                </form>
            </div>
        </ManagerLayout >
    );
}

export default EventsCreate
