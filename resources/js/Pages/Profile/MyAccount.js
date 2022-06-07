import BannerHero from "@/Components/BannerHero";
import NotificationSuccess from "@/Components/NotificationSuccess";
import ValidationErrors from "@/Components/ValidationErrors";
import Layout from "@/Layouts/Layout";
import { Link, useForm, usePage } from "@inertiajs/inertia-react";

const MyAccount = ({ children, title }) => {
    const { errors, auth } = usePage().props;

    const logout = useForm();
    const handleLogout = () => {
        logout.post(route("logout"));
    };
    const profileRoutes = [
        {
            name: "Dashboard",
            path: route("profile.my_account"),
            active: route().current("profile.my_account"),
        },
        {
            name: "Mis Compras",
            path: route("profile.my_orders"),
            active: route().current("profile.my_orders"),
        },
        {
            name: "Detalles de cuenta",
            path: route("profile.account_details"),
            active: route().current("profile.account_details"),
        },
        {
            name: "Cambiar contraseña",
            path: route("profile.change_password"),
            active: route().current("profile.change_password"),
        },
    ];
    return (
        <Layout title="Perfil">
            <BannerHero img="/img/movies.jpg" title={auth.user.name} />

            <div className="container py-section">
                <div className="grid grid-cols-12 md:gap-4 gap-y-10">
                    <div className="col-span-12 md:col-span-3">
                        <h3 className="text-3xl text-emerald-500 font-primary font-bold ">
                            Mi cuenta
                        </h3>
                        <div className="flex flex-col mt-6">
                            {profileRoutes.map((route) => (
                                <Link
                                    key={route.path}
                                    href={route.path}
                                    preserveScroll
                                    className={
                                        "block py-3 pl-4 border-l-4 font-semibold  " +
                                        (route.active
                                            ? "border-emerald-500 text-emerald-500 "
                                            : "border-emerald-100  hover:border-emerald-500 hover:text-emerald-500")
                                    }
                                >
                                    {route.name}
                                </Link>
                            ))}
                        </div>
                        <div className="mt-6">
                            <button
                                className="uppercase font-bold rounded  text-emerald-500 border border-emerald-500 text-sm py-2 px-4 hover:bg-emerald-500 hover:text-white disabled:opacity-25 leading-none"
                                onClick={handleLogout}
                                type="Button"
                                disabled={logout.processing}
                            >
                                Cerrar Sesion
                            </button>
                        </div>
                    </div>
                    <div className="col-span-12 md:col-span-9">
                        <div className="space-y-5">
                            <NotificationSuccess />
                            <ValidationErrors errors={errors} />
                            <h2 className="text-3xl font-medium">{title}</h2>
                            {children}
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default MyAccount;
