import Button from "@/Components/Button";
import Input from "@/Components/Input";
import Label from "@/Components/Label";
import ValidationErrors from "@/Components/ValidationErrors";
import { useForm } from "@inertiajs/react";
import MyAccount from "./MyAccount";

const AccountDetails = ({ auth }) => {
	const { data, setData, processing, post, errors } = useForm({
		name: auth.user.name,
		phone: auth.user.phone,
		email: auth.user.email,
		email_confirmation: auth.user.email,
	});
	const handleSubmit = async (e) => {
		e.preventDefault();
		post(route("store_account_details"), { preserveScroll: true });
	};
	const onHandleChange = (event) => {
		setData(event.target.name, event.target.value);
	};
	return (
		<MyAccount active="account-details" title="Detalles de Cuenta">

			<form onSubmit={handleSubmit}>
				<div className="grid grid-cols-1 md:grid-cols-2 gap-8 ">
					<div>
						<Label forInput="email" value="Nombre y Apellido *" />
						<Input
							className="w-full mt-1"
							required={true}
							handleChange={onHandleChange}
							name="name"
							value={data.name}
						/>
					</div>
					<div>
						<Label forInput="email" value="Telefono *" />
						<Input
							className="w-full mt-1"
							required={true}
							handleChange={onHandleChange}
							name="phone"
							value={data.phone}
						/>
					</div>
					<div>
						<Label forInput="email" value="Email *" />
						<Input
							className="w-full mt-1"
							required={true}
							type="email"
							handleChange={onHandleChange}
							name="email"
							value={data.email}
						/>
					</div>

					<div>
						<Label forInput="email" value="Confirmar Email *" />
						<Input
							className="w-full mt-1"
							required={true}
							type="email"
							handleChange={onHandleChange}
							value={data.email_confirmation}
							name="email_confirmation"
						/>
					</div>
				</div>
				<Button className="mt-6" processing={processing}>Guardar</Button>
			</form>
		</MyAccount>
	);
};

export default AccountDetails;
