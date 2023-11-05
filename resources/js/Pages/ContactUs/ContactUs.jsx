import Card from '@/Components/Card'
import BannerHero from '@/Components/Hero/BannerHero'
import ListDescription from '@/Components/ListDescription'
import TitleSection from '@/Components/TitleSection'
import Layout from '@/Layouts/Layout'
import React from 'react'
import CardsInformation from './CardsInformation'
import FormContact from './FormContact'

const ContactUs = () => {
    return (
        <Layout title="Contáctenos">
            <BannerHero title="Contáctenos" />
            <div className='container'>
                <div className=' py-section'>
                    <TitleSection title="Información del contacto" subTitle="OBTENER INFORMACIÓN" />
                    <CardsInformation />
                </div>
                <div className='py-section'>
                    <iframe loading="lazy" className='w-full h-96' src="https://maps.google.com/maps?q=Brighton%20Waterfront%20Hotel%2C%20Brighton&amp;t=m&amp;z=16&amp;output=embed&amp;iwloc=near" ></iframe>
                </div>
            </div>

            <div className='container'>
                <div className=' py-section'>

                    <FormContact />
                </div>
            </div>

        </Layout>
    )
}

export default ContactUs
