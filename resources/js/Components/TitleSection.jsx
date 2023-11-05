import React from 'react'

const TitleSection = ({ title, subTitle = "", className }) => {
    return (
        <div className={'mb-10 ' + className}>
            {subTitle && (<span className="inline-block text-primary-500 mb-3 font-semibold">{subTitle}</span>)}
            <h2 className="text-2xl font-bold uppercase md:text-4xl">
                {title}
            </h2>
        </div>
    )
}

export default TitleSection
