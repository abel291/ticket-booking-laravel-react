import React from "react";
import Button from "@/Components/Button";
import Guest from "@/Layouts/Guest";
import Input from "@/Components/Input";
import ValidationErrors from "@/Components/ValidationErrors";
import { Head, useForm } from "@inertiajs/react";

export default function ForgotPassword({ status }) {
	const { data, setData, post, processing, errors } = useForm({
		email: "",
	});

	const onHandleChange = (event) => {
		setData(event.target.name, event.target.value);
	};

	const submit = (e) => {
		e.preventDefault();

		post(route("password.email"));
	};

	return (
		<Guest>
			<Head title="¿Olvidaste tu contraseña?" />

			<div className="mb-4 text-sm leading-7">
				¿Olvidaste tu contraseña? No hay problema. Solo háganos saber su
				dirección de correo electrónico y le enviaremos un correo
				electrónico con un enlace de restablecimiento de contraseña que
				le permitirá elegir una nueva.
			</div>

			{status && (
				<div className="mb-4 font-medium text-sm text-primary-500">
					{status}
				</div>
			)}

			<ValidationErrors errors={errors} />

			<form onSubmit={submit}>
				<Input
					type="text"
					name="email"
					value={data.email}
					className="mt-1 block w-full"
					isFocused={true}
					handleChange={onHandleChange}
				/>

				<div className="flex items-center justify-end mt-4">
					<Button className="ml-4" processing={processing}>
						Restablecimiento de contraseña
					</Button>
				</div>
			</form>
		</Guest>
	);
}
