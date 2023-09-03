import React from 'react'
import Modal from '@/Components/Modal'
import { ExclamationTriangleIcon } from '@heroicons/react/24/outline'
import { Dialog } from '@headlessui/react'
import Button from '@/Components/Button'
import { useForm } from '@inertiajs/react'
import ButtonSecondary from '@/Components/ButtonSecondary'

const ModalConfirmationDelete = ({ modalOpen, setModalOpen, pathDelete }) => {

    const { delete: destroy, processing } = useForm();
    const handleClick = (e) => {
        e.preventDefault()
        console.log(pathDelete)
        destroy(pathDelete, {
            preserveScroll: true,
            onSuccess: () => setModalOpen(false)
        })
    }
    return (
        <Modal maxWidth="lg" show={modalOpen} onClose={() => setModalOpen(false)}>
            <div className="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div className="sm:flex sm:items-start">
                    <div className="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <ExclamationTriangleIcon className="h-6 w-6 text-red-600" aria-hidden="true" />
                    </div>
                    <div className="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <Dialog.Title as="h3" className="text-base font-semibold leading-6 text-gray-900">
                            Eliminar Registro
                        </Dialog.Title>
                        <div className="mt-2">
                            <p className="text-sm text-gray-500">
                                ¿Está seguro de que desea Eliminar este registro ? Todos los datos serán eliminados permanentemente.
                                Esta acción no se puede deshacer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div className="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 ">

                <Button type="button" onClick={handleClick} className='btn bg-red-600  text-white hover:bg-red-500 sm:ml-3' processing={processing}>
                    Eliminar
                </Button>

                <ButtonSecondary onClick={() => setModalOpen(false)}>
                    Cancelar
                </ButtonSecondary>
            </div>
        </Modal>
    )
}

export default ModalConfirmationDelete
