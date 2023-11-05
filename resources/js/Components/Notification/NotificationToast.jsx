import { usePage } from '@inertiajs/react';
import toast, { Toaster } from 'react-hot-toast';
import { useEffect } from 'react';

import { XCircleIcon, XMarkIcon } from '@heroicons/react/24/solid';
import ErrorToast from './ErrorToast';
import SuccessToast from './SuccessToast';
const NotificationToast = () => {
    const { flash, errors } = usePage().props

    useEffect(() => {
        toast.remove()
        flash.success && toast.custom((t) => <SuccessToast title={flash.success} toast={t} onDismiss={() => toast.dismiss(t.id)} />);
        flash.error && toast.custom((t) => <ErrorToast errors={[flash.error]} toast={t} onDismiss={() => toast.dismiss(t.id)} />)

        const errorsArray = Object.values(errors);
        (errorsArray.length > 0)
            &&
            toast.custom((t) => <ErrorToast errors={errorsArray} toast={t} onDismiss={() => toast.dismiss(t.id)} />)

    }, [flash])

    return (
        <div>
            <Toaster
                position="top-right"
                reverseOrder={false}
                toastOptions={{
                    custom: { duration: 10000, }
                }}
            />
        </div>
    )
}


export default NotificationToast
