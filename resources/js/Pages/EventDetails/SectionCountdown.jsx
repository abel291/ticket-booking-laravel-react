import React from "react";
import { Link } from "@inertiajs/react";
import Countdown from "react-countdown";

// import {
//     FaAddressBook,
//     FaChalkboardTeacher,
//     FaCommentAlt,
//     FaFacebookF,
//     FaGoogle,
//     FaMapMarkerAlt,
//     FaTwitter,
//     FaYoutube,
// } from "react-icons/fa";
const SectionCountdown = ({ title, location }) => {
	return (
		<div className="container relative ">
			<div className="bg-gradient rounded py-8 px-6 -mt-16">
				<div className="flex flex-col items-center justify-between gap-5 lg:flex-row">
					<div className="w-full lg:w-5/12">
						<h4 className="font-semibold uppercase">
							{title}
						</h4>
					</div>
					{/* <div>
                        <div className="flex flex-col items-center gap-5 xl:flex-row">
                            <div className="grow">
                                <Countdown
                                    date={Date.now() + 100000000}
                                    renderer={renderer}
                                />
                            </div>

                        </div>
                    </div> */}
				</div>
				<div className="my-6 border-t border-white border-opacity-30"></div>
				<div className="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

					<div className="flex gap-2  ">
						{/* <FaMapMarkerAlt className="h-8 w-auto flex-none" /> */}
						<div >
							<span className="font-semibold">{location.name}</span>
							<div className="text-sm">
								{location.address}
							</div>
						</div>
					</div>
					<div className="flex  gap-2">
						{/* <FaAddressBook className="h-8 w-auto flex-none" /> */}
						<div >
							<span className="block">Escríbanos:</span>
							<span className="block">
								<Link className="text-sm text-primary-400">
									hola@MyTicket.com
								</Link>
							</span>
						</div>
					</div>
					<div>
						<div className="flex gap-4 lg:justify-end   ">
							<a
								href={route("home")}
								className="flex-none rounded-full border border-white border-opacity-30 p-3 hover:bg-primary-400">
								{/* <FaFacebookF className="h-4 w-full" /> */}
							</a>

							<a href={route("home")}
								className="flex-none rounded-full border border-white border-opacity-30 p-3 hover:bg-primary-400">
								{/* <FaTwitter className="h-4 w-full" /> */}
							</a>

							<a href={route("home")}
								className="flex-none rounded-full border border-white border-opacity-30 p-3 hover:bg-primary-400">
								{/* <FaGoogle className="h-4 w-full" /> */}
							</a>

							<a href={route("home")}
								className="flex-none rounded-full border border-white border-opacity-30 p-3 hover:bg-primary-400">
								{/* <FaYoutube className="h-4 w-full" /> */}
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	);
};
const renderer = ({ days, hours, minutes, seconds }) => {
	return (
		<div className="flex gap-2 uppercase">
			<div className="text-center">
				<h3 className="font-semibold">{days}</h3>
				<span className="mt-2 text-sm font-light">Dias</span>
			</div>
			<span className="text-2xl text-white sm:text-3xl  md:text-4xl">
				:
			</span>
			<div className="text-center">
				<h3 className="font-semibold">{hours}</h3>
				<span className="mt-2 text-sm font-light">Horas</span>
			</div>
			<span className="text-2xl text-white sm:text-3xl  md:text-4xl">
				:
			</span>
			<div className="text-center">
				<h3 className="font-semibold">{minutes}</h3>
				<span className="mt-2 text-sm font-light">Minutos</span>
			</div>
			<span className="text-2xl text-white sm:text-3xl  md:text-4xl">
				:
			</span>
			<div className="text-center">
				<h3 className="font-semibold">{seconds}</h3>
				<span className="mt-2 text-sm font-light">Segundos</span>
			</div>
		</div>
	);
};
export default SectionCountdown;
