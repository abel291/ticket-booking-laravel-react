import React, { useEffect } from "react";
import Button from "@/Components/Button";
import Checkbox from "@/Components/Checkbox";
import Guest from "@/Layouts/Guest";
import Input from "@/Components/Input";
import Label from "@/Components/Label";
import ValidationErrors from "@/Components/ValidationErrors";
import { Head, Link, useForm } from "@inertiajs/inertia-react";

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
        password: "",
        remember: "",
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
                <div className="mb-4 text-sm font-medium text-emerald-500">
                    {status}
                </div>
            )}

            <ValidationErrors errors={errors} />
            <div className="text-center ">
                <span className="text-2xl text-emerald-500">Hola</span>
                <div className="mt-3 text-3xl font-bold">
                    BIENVENIDO DE NUEVO
                </div>
            </div>
            <form onSubmit={submit} className="mt-9 ">
                <div>
                    <Label forInput="email" value="Correo" />

                    <Input
                        required
                        type="text"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        isFocused={true}
                        handleChange={onHandleChange}
                    />
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
                </div>

                <div className="mt-4 block">
                    <div className="flex items-center justify-between">
                        <label className="flex items-center">
                            <Checkbox
                                name="remember"
                                value={data.remember}
                                handleChange={onHandleChange}
                            />
                            <span className="ml-2 text-sm">
                                Acuérdate de mí
                            </span>
                        </label>
                        {canResetPassword && (
                            <Link
                                href={route("password.request")}
                                className="text-sm underline hover:text-gray-300"
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
                        className="font-bold text-emerald-500 hover:underline"
                    >
                        Regístrate ahora
                    </Link>
                </div>
            </form>
        </Guest>
    );
}
