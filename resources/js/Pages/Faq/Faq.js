import React from 'react'
import FrequentlyAsked from "@/Components/FrequentlyAsked";
import Layout from "@/Layouts/Layout";
import BannerHero from '@/Components/BannerHero';
const Faq = () => {
  return (
    <Layout>
      <BannerHero title="Preguntas frecuentes" />
      <div className='py-section container'>
        
        <div className='space-y-4'>
          <FrequentlyAsked question="¿Cuánto cuesta usar MyTicket">
            <p>
              El precio de MyTicket es el 2 % del precio del boleto y $0,79 por boleto pagado más el 2,5 % de procesamiento de pago por transacción para nuestro paquete esencial.
              El precio de MyTicket es del 3,5 % del precio del boleto y $1,59 por boleto pagado más una tarifa de procesamiento de pago del 2,5 % por transacción para nuestro paquete profesional.
              El paquete premium de MyTicket tiene precios personalizados.
              Revisa nuestros paquetes aquí.
            </p>

          </FrequentlyAsked>

          <FrequentlyAsked question="¿Me permite MyTicket escanear boletos?">
            <p>
              La respuesta simple a estas preguntas frecuentes comunes sobre boletos de MyTicket es sí, puedes escanear boletos. Con la aplicación MyTicket Organizador, puede registrar a los asistentes usando la cámara de su teléfono inteligente o tableta para escanear los códigos QR de los asistentes en sus boletos. A los asistentes al evento les encantará poder registrarse sin boletos impresos, y podrá mover a los asistentes a través de la línea de manera más eficiente.
            </p>
          </FrequentlyAsked>

          <FrequentlyAsked question="¿Puedo integrar MyTicket con otros servicios que uso?">
            <p>
              MyTicket ofrece una integración perfecta del sitio web de tu evento con otros servicios, lo que puede simplificar la planificación de tu evento. Integre su sitio web o blog de WordPress con el organizador de MyTicket para promocionar su evento y vender entradas. Usa MyTicket para la emisión de boletos y combínalo con tu plataforma de eventos virtuales favorita, como Zoom, para organizar eventos virtuales o híbridos.
            </p>
          </FrequentlyAsked>

          <FrequentlyAsked question="¿Puedo actualizar mis boletos después de realizar un pedido?">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Accusantium neque corrupti quo pariatur odio, ea est
              dicta doloremque ducimus cumque sed reiciendis quaerat,
              modi hic, nostrum ullam labore voluptate tempora.
            </p>
            <p className="mt-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing
              elit. Nobis natus dignissimos blanditiis? Assumenda,
              vitae.
            </p>
          </FrequentlyAsked>

          <FrequentlyAsked question="¿Por qué cambió el método de entrega de mis boletos?">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Accusantium neque corrupti quo pariatur odio, ea est
              dicta doloremque ducimus cumque sed reiciendis quaerat,
              modi hic, nostrum ullam labore voluptate tempora.
            </p>
            <p className="mt-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing
              elit. Nobis natus dignissimos blanditiis? Assumenda,
              vitae.
            </p>
          </FrequentlyAsked>
        </div>
        
      </div>
    </Layout>
  )
}

export default Faq

