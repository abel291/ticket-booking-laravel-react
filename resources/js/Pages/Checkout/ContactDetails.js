import Card from "@/Components/Card";
import Input from "@/Components/Input";
import { usePage } from "@inertiajs/inertia-react";
import React from "react";

const ContactDetails = ({ data, setData }) => {
	const { auth } = usePage().props

	const handleChange = (e) => {
		let target = e.target;
		setData({ ...data, [target.name]: target.value })
	}

	return (
		<Card title="Comparta sus Datos de Contacto">
			<div >
				<div className="mt-7 grid grid-cols-2 gap-4">
					<div>
						<Input
							handleChange={handleChange}
							className="w-full"
							required={true}
							name="name"
							value={data.name}
							placeholder="Nombre y Apelido *"
						/>
					</div>
					<div>
						<Input
							handleChange={handleChange}
							className="w-full"
							required={true}
							name="phone"
							value={data.phone}
							placeholder="Telefono *"
						/>
					</div>
					<div className=" col-span-2">
						<input
							disabled={true}
							className="input w-full disabled:opacity-25 "
							type="text"
							value={auth.user.email}
							placeholder="Correo electronico *"
						/>
					</div>

				</div>
			</div>
		</Card>
	);
};

export default ContactDetails;
