import React from 'react'
import "flatpickr/dist/themes/airbnb.css";
import Spanish from 'flatpickr/dist/l10n/es.js';
import Flatpickr from "react-flatpickr";

import InputError from '@/Components/InputError';
const InputDateLabelError = ({ errors = null, name, className, handleChangeDate, ...props }) => {

    const options = {
        locale: { Spanish },
        time_24hr: false,
        dateFormat: 'Y-m-d H:i:s',
        altFormat: 'F j, Y h:i K',
        altInput: true,
        enableTime: true,
    }
    return (
        <>
            <Flatpickr
                options={options}
                data-enable-time
                name={name}
                className={"input-form " + className}
                onChange={([dateSelected]) => {
                    let year = dateSelected.getFullYear();
                    let month = dateSelected.getMonth();
                    month = ('0' + (month + 1)).slice(-2);

                    let date = dateSelected.getDate();
                    date = ('0' + date).slice(-2);

                    let hour = dateSelected.getHours();
                    hour = ('0' + hour).slice(-2);

                    let minute = dateSelected.getMinutes();
                    minute = ('0' + minute).slice(-2);

                    let second = dateSelected.getSeconds();
                    second = ('0' + second).slice(-2);

                    const time = `${year}-${month}-${date} ${hour}:${minute}:${second}`;
                    console.log(time);
                    //handleChangeDate(name, date)
                }}
                {...props}
            />
            <InputError message={errors} className="mt-2" />
        </>
    )
}

export default InputDateLabelError
