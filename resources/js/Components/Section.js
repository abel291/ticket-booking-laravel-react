import React from 'react'

const Section = ({children}) => {
  return (
    <div className='container py-20 lg:py-24 xl:py-32'>
        {children}
    </div>
  )
}

export default Section