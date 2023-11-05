import Button from '@/Components/Button';
import FormGrid from '@/Components/Form/FormGrid'
import InputLabelError from '@/Components/Form/InputLabelError'
import TextAreaLabelError from '@/Components/Form/TextAreaLabelError';
import TitleSection from '@/Components/TitleSection';
import { useForm } from '@inertiajs/react';
import React from 'react'

const FormContact = ({ form }) => {
    const { setData, data, post, processing, errors } = useForm({
        name: "user",
        phone: "1122",
        email: "user@user.com",
        subject: "subject",
        message: "message"

    });

    const handleSubmit = (e) => {
        e.preventDefault()
        post(route('contact_us.save'))

    }
    const handleChange = (e) => {
        e.preventDefault()
        let target = e.target
        setData(target.name, target.value)
    }
    return (
        <div className='mx-auto max-w-3xl'>
            <TitleSection className='text-center' title="Enviar mensaje" subTitle="¿TIENE PREGUNTAS?" />
            <form onSubmit={handleSubmit}>
                <FormGrid>
                    <div className="sm:col-span-3">
                        <InputLabelError handleChange={handleChange} errors={errors.title} label="Nombre" name="name" value={data.name} />
                    </div>
                    <div className="sm:col-span-3">
                        <InputLabelError handleChange={handleChange} errors={errors.slug} label="Telefono" name="phone" value={data.phone} />
                    </div>
                    <div className="sm:col-span-3">
                        <InputLabelError type="email" handleChange={handleChange} errors={errors.slug} label="Email" name="email" value={data.email} />
                    </div>
                    <div className="sm:col-span-3">
                        <InputLabelError handleChange={handleChange} errors={errors.slug} label="Asunto" name="subject" value={data.subject} />
                    </div>
                    <div className="sm:col-span-6">
                        <TextAreaLabelError rows="6" handleChange={handleChange} errors={errors.slug} label="Mensaje" name="message" value={data.message} />
                    </div>
                    <div className="sm:col-span-6 text-center">
                        <Button processing={processing} >Enviar mensaje</Button>
                    </div>
                </FormGrid>

            </form>
        </div>

    )
}

export default FormContact
