import BannerHero from '@/Components/Hero/BannerHero'
import Layout from '@/Layouts/Layout'
import React from 'react'

const PrivacyPolicy = () => {
	return (
		<Layout title="Política de privacidad">
			<BannerHero title="Política de privacidad de MyTicket" />
			<div className='py-section container'>
				<div className='space-y-6'>
					<div >
						<h5 className='font-medium'>Aplicación.</h5>
						<p className='mt-2'>
							La presente Política de privacidad establece la política con respecto a la información que se puede asociar a, o que se relaciona con, una persona específica y podría usarse para identificar a una persona ("Datos personales") que se recopilan de los Usuarios en o a través de los Servicios. Esta política también cubre los datos personales recopilados de clientes y posibles clientes de ventas de MyTicket. Nos tomamos muy en serio la privacidad de tus Datos personales. Por esa razón, hemos redactado la presente Política de privacidad. Lee esta Política de privacidad, ya que incluye información importante acerca de tus Datos personales y otro tipo de información.
						</p>
						<p>
							Por tanto, los "Datos no personales" tal y como se usan en esta Política de privacidad, son cualquier tipo de información que no se relacione con una persona o que no se pueda usar para identificar a una persona. Cuando interactúas con los Servicios, podemos recopilar Datos no personales. Las limitaciones y los requisitos en esta Política de privacidad sobre nuestro uso, recopilación, divulgación, transferencia y almacenamiento o retención de Datos personales no se aplican a los Datos no personales.
						</p>
					</div>

					<div>
						<h5 className='font-medium'>Datos personales que recopilamos.</h5>
						<p className='mt-2'>
							Cuando interactúas con nosotros a través de los Servicios, o te involucras con MyTicket como cliente o posible cliente de ventas, podemos recopilar Datos personales. A veces esto será en nuestro propio nombre y otras veces será en nombre de un Organizador que utiliza nuestros Servicios para llevar a cabo un evento. Esta es una distinción importante a efectos de ciertas leyes de protección de datos y se explica con más detalle abajo.
						</p>
					</div>

					<div>
						<h5 className='font-medium'>Información recopilada de todos los Usuarios.</h5>
						<p className='mt-2'>
							Información que nos proporcionas: al igual que hacemos con todos los Usuarios, recopilamos Datos personales cuando proporcionas de forma voluntaria dicha información a los Servicios (por ejemplo, al registrarte para acceder a los Servicios, al ponerte en contacto con nosotros para resolver dudas, al responder a una de nuestras encuestas o al examinar o usar ciertas partes de los Servicios). Los Datos personales que podemos recopilar incluyen sin limitación, tu nombre, dirección, dirección de correo electrónico y cualquier otra información que decidas proporcionar y/o que permita la identificación personal de los Usuarios. Información que recopilamos automáticamente: asimismo, recopilamos de manera automática ciertos datos técnicos que recibimos del ordenador, dispositivo móvil o navegador a través del cual accedes a los Servicios ("Datos automáticos"). Entre los Datos automáticos se incluyen sin limitación, un identificador único asociado a tu navegador o dispositivo de acceso, (incluidos, por ejemplo, tu dirección IP (Internet Protocol)), características sobre tu dispositivo de acceso o navegador, estadísticas sobre tus actividades en los Servicios, información sobre cómo llegaste a los Servicios y datos recopilados a través de cookies, etiquetas de píxel, objetos compartidos localmente, almacenamiento web y otras tecnologías similares. Encontrarás más información sobre cómo usamos cookies y otras tecnologías de seguimiento similares en nuestra Declaración de cookies. Al registrarte para los Servicios o, por lo demás, al enviarnos Datos personales, podemos asociar otros Datos no personales (incluidos Datos no personales que recopilamos de terceros) con tus Datos personales. En tal caso, trataremos todos aquellos datos combinados pertinentes como si se tratara de tus Datos personales hasta el momento en que ya no se puedan asociar a ti o usar para identificarte.
						</p>
					</div>

					<div>
						<h5 className='font-medium'>Razón específica.</h5>
						<p className='mt-2'>
							Si proporcionas Datos personales para un fin en concreto, podremos usarlos para lo relacionado con el fin para el cual se proporcionaron. Por ejemplo, si te pones en contacto con nosotros por correo electrónico, utilizaremos los Datos personales que nos facilites para responder a tu pregunta o solucionar el problema, y responderemos a la dirección de correo electrónico desde la que se envió el mensaje.
						</p>
					</div>

				</div>
			</div>
		</Layout>
	)
}

export default PrivacyPolicy
