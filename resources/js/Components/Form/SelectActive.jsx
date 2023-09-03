import React from 'react'
import SelectLabelError from './SelectLabelError'

const SelectActive = (props) => {
    return (
        <SelectLabelError {...props} label="Activo" >
            <>
                <option value="1">Si</option>
                <option value="0">No</option>
            </>
        </SelectLabelError>
    )
}

export default SelectActive
