import { Link } from "@inertiajs/react";

import MyAccount from "./MyAccount";

const Dashboard = () => {


	return (
		<MyAccount active="dashboard" title="Tablero">
			<div>
				Desde el panel de control de su cuenta, puede ver sus ,
				administrar los
				<Link href={route("profile.my_orders")} className="font-medium underline px-1 ">
					pedidos recientes
				</Link>
				, administrar los
				<Link
					href={route("profile.account_details")}
					className="font-medium underline px-1 "
				>
					detalles de su cuenta
				</Link>
				y
				<Link href="/" className="font-medium underline px-1 ">
					cambiar su contraseña.
				</Link>
				.
			</div>
		</MyAccount>
	);
};

export default Dashboard;
