import FormGrid from '@/Components/Form/FormGrid'
import InputCheckBoxLabelError from '@/Components/Form/InputCheckBoxLabelError'
import InputPriceLabelError from '@/Components/Form/InputPriceLabelError'
import SelectLabelError from '@/Components/Form/SelectLabelError'
import { formatCurrency } from '@/Helpers/Helpers'
import { usePage } from '@inertiajs/react'
import React, { useEffect, useRef, useState } from 'react'


const TicketTypeFormPrice = ({ handleChange, data, errors }) => {
    const { typePrice } = usePage().props;
    const [loading, setLoading] = useState(false)
    const [price, setPrice] = useState(0)

    const calculatePrice = (price_basic, includeFee) => {

        setLoading(true)
        axios.get(route('manager.ticket_type.calculate_price'), {
            params: {
                price_basic: price_basic,
                includeFee: includeFee || ""
            }
        })
            .then(function (response) {
                setPrice(response.data)
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function () {
                setLoading(false)
            });
    }

    let timer;
    function debounce(func, timeout = 300) {
        clearTimeout(timer);
        timer = setTimeout(() => {
            func()
        }, timeout);
    }

    useEffect(() => {

        debounce(() => {
            calculatePrice(data.price_basic, data.includeFee)
        })

        return () => clearTimeout(timer);
    }, [data.price_basic, data.includeFee])

    return (
        <FormGrid>
            <div className="sm:col-span-2">
                <SelectLabelError handleChange={handleChange} errors={errors.type} label="Tipo de boleto" name="type" value={data.type}>
                    <>
                        <option value="">Seleccione un Opcion</option>
                        {typePrice.map((item) => (
                            <option key={item.value} value={item.value}>{item.name}</option>
                        ))}

                    </>
                </SelectLabelError>
            </div>
            <div className="sm:col-span-4"></div>
            {data.type != 'free' && (
                <>
                    <div className="sm:col-span-2">
                        <InputPriceLabelError label="Precio de venta" type='number' min="0" autoComplete="off"
                            handleChange={handleChange} errors={errors.price_basic} value={data.price_basic} name="price_basic" />
                        <span className='text-xs text-gray-400'>
                            Total del comprador:
                            {loading ? ('...') : formatCurrency(price)}
                        </span>
                    </div>

                    <div className="sm:col-span-4">
                        <InputCheckBoxLabelError
                            errors={errors.includeFee}
                            label="Absorber tarifas"
                            text="Las tarifas de emisión de boletos se deducen de los ingresos por boletos"
                            name="includeFee"
                            value={data.includeFee}
                            handleChange={handleChange} />
                    </div>
                </>
            )}
        </FormGrid>
    )
}

export default TicketTypeFormPrice
