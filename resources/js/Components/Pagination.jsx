import { Link } from "@inertiajs/react";


const Pagination = ({ data }) => {
    return (
        <nav
            role="navigation"
            aria-label="Pagination Navigation"
            className="flex justify-between "
        >
            <div className="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p className="leading-5">
                        Mostrando{" "}
                        <span className="font-medium">{data.meta.from}</span> a{" "}
                        <span className="font-medium">{data.meta.to}</span> de{" "}
                        <span className="font-medium">{data.meta.total}</span>{" "}
                        resultados
                    </p>
                </div>
            </div>

            <div>
                {data.meta.total > data.meta.per_page && (
                    <nav
                        role="navigation"
                        aria-label="Pagination Navigation"
                        className="flex justify-between space-x-2 "
                    >
                        {data.links.prev === null ? (
                            <span className="px-4 py-2 text-sm opacity-20 transition-colors">
                                Anterior
                            </span>
                        ) : (
                            <Link
                                href={data.links.prev}
                                className="px-4 py-2 text-sm  font-medium  transition hover:text-white"
                            >
                                Anterior
                            </Link>
                        )}

                        {data.links.next === null ? (
                            <span className="px-4 py-2 text-sm opacity-20 transition-colors">
                                Siguente
                            </span>
                        ) : (
                            <Link
                                href={data.links.next}
                                className="px-4 py-2 text-sm font-medium transition hover:text-white"
                            >
                                Siguiente
                            </Link>
                        )}
                    </nav>
                )}
            </div>
        </nav>
    );
};

export default Pagination;
