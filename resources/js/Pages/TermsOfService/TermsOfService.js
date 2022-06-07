import BannerHero from '@/Components/BannerHero'
import Layout from '@/Layouts/Layout'
import { Link } from '@inertiajs/inertia-react'
import React from 'react'

const PrivacyPolicy = () => {
    return (
        <Layout title="Términos de servicio">
            <BannerHero title="Términos de servicio de MyTicket" />
            <div className='py-section container'>
                <div className='space-y-6'>
                    <div >
                        <h5 className='font-medium'>Servicios y rol de MyTicket.</h5>
                        <p className='mt-2'>
                            Lo que hacemos. Los Servicios de MyTicket ofrecen una manera rápida y sencilla para que los Organizadores creen perfiles de ponentes, perfiles de organizadores y otras páginas web relacionadas con sus eventos, promocionen estas páginas web y los eventos a los visitantes o navegadores en los Servicios o en cualquier otro lugar en línea, gestionen entradas y registros en línea o in situ, soliciten donaciones y vendan o reserven artículos promocionales o alojamientos relacionados con esos eventos a Consumidores o a Usuarios. Las descripciones de otros servicios más específicos generalmente pueden encontrarse en el Sitio de cada una de las Propiedades de MyTicket.
                        </p>
                        <p className='mt-2'>
                            Cómo encajamos. MyTicket no es el creador, organizador ni el propietario de los eventos listados en los Servicios. Por el contrario, MyTicket proporciona sus Servicios, que permiten a los Organizadores gestionar la venta de entradas y el registro, y promocionar sus eventos. El Organizador es el único responsable de garantizar que cualquier página que muestre un evento en los Servicios (y el evento mismo) cumpla todas las leyes, normas y reglamentaciones locales, estatales, provinciales, nacionales y de otro tipo, y que los bienes y servicios descritos en la página del evento se entregan como se describe y de una manera satisfactoria y precisa. El Organizador de un evento de pago selecciona el método de procesamiento de pagos para su evento como se describe más detalladamente en el Acuerdo comercial. Los Consumidores deben usar cualquier método de procesamiento de pagos que seleccione el Organizador. Si el Organizador selecciona un método de procesamiento de pagos que utilice un tercero para procesar los pagos, ni MyTicket ni sus socios de procesamiento de pagos procesarán la transacción, sino que transmitiremos los detalles de pago del Consumidor al proveedor de servicios de pago designado por el Organizador. Si un Organizador usa el procesamiento de pagos de MyTicket (como se define en el Acuerdo comercial), MyTicket actúa también como el agente limitado del Organizador únicamente para el fin de usar a nuestros proveedores de servicios de pago de terceros para cobrar pagos realizados por Consumidores en los Servicios y pasar tales pagos al Organizador.
                        </p>
                    </div>

                    <div>
                        <h5 className='font-medium'>Privacidad e información del Consumidor</h5>
                        <p className='mt-2'>
                            abemos que tu información personal es importante para ti, y también es importante para MyTicket. La información proporcionada a MyTicket por los Usuarios o recopilada por MyTicket a través de las Propiedades de MyTicket, se rige por nuestra 
                            <Link className="text-emerald-500" href={route('privacy_policy')}>Política de privacidad</Link>.
                        </p>
                    </div>

                    <div>
                        <h5 className='font-medium'>Vigencia y finalización.</h5>
                        <p className='mt-2'>
                            Estos Términos se te aplican tan pronto como accedas a los Servicios por cualquier medio y continúan en vigor hasta que finalicen. Puede llegar el momento en que tú o MyTicket decidáis que es mejor separarse, como se describe en las Secciones 4.2 o 4.3 a continuación. Cuando eso sucede, estos Términos generalmente ya no se aplicarán. Sin embargo, como se describe en la Sección 4.4, ciertas disposiciones siempre serán aplicables tanto a ti como a MyTicket.
                        </p>
                    </div>

                    <div>
                        <h5 className='font-medium'>Renuncia de garantías y asunción de riesgos por tu parte.</h5>
                        <p className='mt-2'>
                            En la medida en que lo permita la ley aplicable, los Servicios se prestan "tal cual" y "sujetos a disponibilidad". MyTicket renuncia expresamente a todas las garantías de cualquier tipo, explícitas o implícitas, incluidas, entre otras, las garantías implícitas de mercantibilidad, título, no infracción e idoneidad para un fin determinado. Por ejemplo, MyTicket no garantiza que: (a) los servicios (o cualquier parte de los Servicios) satisfagan tus requisitos o expectativas, (b) que los Servicios no se interrumpan, sean oportunos, sean seguros o no presenten errores, o (c) los resultados que se puedan obtener del uso de los servicios sean precisos o fiables.
                        </p>
                    </div>

                </div>
            </div>
        </Layout>
    )
}

export default PrivacyPolicy