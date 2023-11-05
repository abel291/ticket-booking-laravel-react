import ApplicationLogo from "@/Components/ApplicationLogo";
import Section from "@/Components/Section";

import { Link } from "@inertiajs/react";
import React from "react";

import Newsletter from "./Newsletter";

const Footer = () => {
	return (
		<div>
			<Section>
				<div className="py-section container relative z-10">
					<Newsletter />
				</div>
			</Section>
			<div className="">
				<div className="container">
					<div>
						<div className="flex items-center justify-between gap-3 border-b  pb-6">
							<div className="">
								<ApplicationLogo className="text-3xl text-primary-500" />
							</div>
							<div className="flex items-center gap-3 text-base">
								<a
									href="google.com"
									target="_blank"
									className="rounded-full bg-white p-2 transition duration-150 hover:bg-primary-400"
								>
									{/* <FaFacebookF className="h-4 w-4  text-primary-700 " /> */}
								</a>
								<a
									href="google.com"
									target="_blank"
									className="rounded-full bg-white p-2 transition duration-150 hover:bg-primary-400"
								>
									{/* <FaTwitter className="h-4 w-4  text-primary-700 " /> */}
								</a>
								<a
									href="google.com"
									target="_blank"
									className="rounded-full bg-white p-2 transition duration-150 hover:bg-primary-400"
								>
									{/* <FaGoogle className="h-4 w-4  text-primary-700 " /> */}
								</a>
							</div>
						</div>
						<div className="flex flex-col justify-between gap-3 py-6 text-sm font-medium lg:flex-row lg:items-center">
							<div className="grow">
								<p>
									Copyright © 2020.All Rights Reserved By{" "}
									<Link
										href={route("home")}
										className="text-primary-500"
									>
										MyTicket
									</Link>
								</p>
							</div>

							<Link
								href={route("about_us")}
								className="hover:text-primary-500"
							>
								Sobre nosotros
							</Link>
							<Link
								href={route("terms_of_service")}
								className="hover:text-primary-500"
							>
								Términos de servicio
							</Link>
							<Link
								href={route("privacy_policy")}
								className="hover:text-primary-500"
							>
								Política de privacidad
							</Link>
							<Link
								href={route("faq")}
								className="hover:text-primary-500"
							>
								FAQ
							</Link>
						</div>
					</div>
				</div>
			</div>
		</div>
	);
};

export default Footer;
