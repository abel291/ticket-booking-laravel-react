import Button from "@/Components/Button";
import Input from "@/Components/Input";
import Label from "@/Components/Label";
import ValidationErrors from "@/Components/ValidationErrors";
import { useForm } from "@inertiajs/react";
import MyAccount from "./MyAccount";

const ChangePassword = () => {
	const { data, setData, processing, post, errors, reset } = useForm({
		current_password: "",
		password: "",
		password_confirmation: "",
	});

	const handleSubmit = async (e) => {
		e.preventDefault();
		post(route("profile.store_change_password"), {
			preserveScroll: true,
			onSuccess: () =>
				reset("current_password", "password", "password_confirmation"),
		});
	};
	const onHandleChange = (event) => {
		setData(event.target.name, event.target.value);
	};

	return (
		<MyAccount active="password" title="Cambiar contraseña">

			<form onSubmit={handleSubmit}>
				<div className="grid grid-cols-1 md:grid-cols-2  gap-6 ">
					<div className="md:col-span-2">
						<Label
							forInput="current_password"
							value="Contraseña Actual *"
						/>
						<Input
							className="w-full mt-1"
							required={true}
							type="password"
							handleChange={onHandleChange}
							value={data.current_password}
							name="current_password"
						/>
					</div>

					<div>
						<Label forInput="password" value="Contraseña nueva *" />
						<Input
							className="w-full mt-1"
							required={true}
							type="password"
							handleChange={onHandleChange}
							value={data.password}
							name="password"
						/>
					</div>
					<div>
						<Label
							forInput="password_confirmation"
							value="Confirmar contraseña nueva *"
						/>
						<Input
							className="w-full mt-1"
							required={true}
							type="password"
							handleChange={onHandleChange}
							value={data.password_confirmation}
							name="password_confirmation"
						/>
					</div>
				</div>
				<Button className="mt-6" processing={processing}>Guardar</Button>
			</form>
		</MyAccount>
	);
};

export default ChangePassword;
