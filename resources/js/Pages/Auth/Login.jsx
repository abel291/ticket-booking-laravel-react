import React, { useEffect } from "react";
import Button from "@/Components/Button";
import Checkbox from "@/default-Components/Checkbox";
import Guest from "@/Layouts/Guest";
import Input from "@/Components/Input";
import Label from "@/Components/Label";
import { Head, Link, useForm } from "@inertiajs/react";
import InputError from "@/Components/InputError";

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "user2@user.com",
        password: "password",
        remember: true,
    });

    useEffect(() => {
        return () => {
            reset("password");
        };
    }, []);

    const onHandleChange = (event) => {
        setData(
            event.target.name,
            event.target.type === "checkbox"
                ? event.target.checked
                : event.target.value
        );
    };

    const submit = (e) => {
        e.preventDefault();
        post(route("login"));
    };
    //Iniciar sesión
    return (
        <Guest>
            <Head title="Iniciar sesión" />

            {status && (
                <div className="mb-4 text-sm font-medium text-primary-500">
                    {status}
                </div>
            )}

            <div className="text-center ">
                <span className="text-2xl text-primary-500">Hola</span>
                <div className="mt-3 text-3xl font-bold">
                    BIENVENIDO DE NUEVO
                </div>
                <div className="text-left text-sm mt-4 font-medium  w-full sm:w-3/5">
                    <div className="sm:grid grid-cols-2 gap-3">
                        <div>admin:</div>
                        <div>user@user.com</div>
                    </div>
                    <div className="sm:grid grid-cols-2 gap-3">
                        <div>invitado:</div>
                        <div>user2@user.com</div>
                    </div>
                </div>
            </div>
            <form onSubmit={submit} className="mt-4 ">
                <div>
                    <Label forInput="email" value="Correo" />

                    <Input
                        required
                        type="text"
                        name="email"
                        value={data.email}
                        placeholder={'email'}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        isFocused={true}
                        handleChange={onHandleChange}
                    />
                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div className="mt-4">
                    <Label forInput="password" value="Contraseña" />

                    <Input
                        required
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="current-password"
                        handleChange={onHandleChange}
                    />
                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-6 block text-sm">
                    <div className="flex items-center justify-between">
                        <label className="flex items-center">
                            <Checkbox
                                name="remember"
                                value={data.remember}
                                onChange={onHandleChange}
                            />
                            <span className="ml-2 ">
                                Acuérdate de mí
                            </span>
                        </label>
                        {canResetPassword && (
                            <Link
                                href={route("password.request")}
                                className=" underline hover:text-gray-300"
                            >
                                ¿Olvidaste tu contraseña?
                            </Link>
                        )}
                    </div>
                </div>

                <div className="mt-8 flex items-center justify-end">
                    <Button className="ml-4" processing={processing}>
                        Iniciar sesión
                    </Button>
                </div>
                <div className="mt-4 text-center text-sm">
                    ¿No tienes una cuenta?{" "}
                    <Link
                        href={route("register")}
                        className="font-bold text-primary-500 hover:underline"
                    >
                        Regístrate ahora
                    </Link>
                </div>
            </form>
        </Guest>
    );
}
