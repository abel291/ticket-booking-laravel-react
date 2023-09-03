import BannerHero from "@/Components/Hero/BannerHero";

import ValidationErrors from "@/Components/ValidationErrors";
import Layout from "@/Layouts/Layout";
import { Link, useForm, usePage } from "@inertiajs/react";

const MyAccount = ({ children, title }) => {
    const { errors, auth } = usePage().props;

    const logout = useForm();
    const handleLogout = () => {
        logout.post(route("logout"));
    };
    const profileRoutes = [
        {
            name: "Dashboard",
            path: "profile.my_account",
        },
        {
            name: "Mis Compras",
            path: "profile.my_orders",
        },
        {
            name: "Detalles de cuenta",
            path: "profile.account_details",
        },
        {
            name: "Cambiar contraseña",
            path: "profile.change_password",
        },
    ];
    return (
        <Layout title="Perfil">
            <BannerHero title={auth.user.name} />
            <div className="container py-section">
                <div className="grid grid-cols-12 md:gap-4 gap-y-10">
                    <div className="col-span-12 md:col-span-3">
                        <h3 className="text-3xl font-primary font-bold ">
                            Mi cuenta
                        </h3>
                        <div className="flex flex-col mt-6">
                            {profileRoutes.map((item) => (
                                <Link
                                    key={route(item.path)}
                                    href={route(item.path)}
                                    preserveScroll
                                    className={
                                        "block py-3 pl-4 border-l-4 font-medium  " +
                                        (route().current(item.path)
                                            ? "border-primary-500 text-primary-500 "
                                            : "border-primary-100  hover:border-primary-500 hover:text-primary-500")
                                    }
                                >
                                    {item.name}
                                </Link>
                            ))}
                        </div>
                        <div className="mt-6">
                            <button
                                className="uppercase font-bold rounded  text-primary-500 border border-primary-500 text-sm py-2 px-4 hover:bg-primary-500 hover:text-white disabled:opacity-25 leading-none"
                                onClick={handleLogout}
                                type="Button"
                                disabled={logout.processing}
                            >
                                Cerrar Sesion
                            </button>
                        </div>
                    </div>
                    <div className="col-span-12 md:col-span-9">
                        <div>
                            <ValidationErrors errors={errors} />
                            <div className="border-b pb-4 mb-4">
                                <h2 className="text-2xl font-semibold">{title}</h2>
                            </div>
                            <div className="">
                                {children}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default MyAccount;
