
import Layout from "@/Layouts/Layout";
import React, { Children } from "react";
import OrderSummary from "./OrderSummary";
import QuantityTicket from "./QuantityTicket";
import SelectDate from "./SelectDate";
import { useState, useEffect, useRef } from "react";
import { Inertia } from "@inertiajs/inertia";
import ContactDetails from "./ContactDetails";
import PromoCode from "./PromoCode";
import PaymentOption from "./PaymentOption";
import { useForm, usePage, useRemember } from "@inertiajs/inertia-react";
import { Elements } from "@stripe/react-stripe-js";
import { loadStripe } from "@stripe/stripe-js";
import ValidationErrors from "@/Components/ValidationErrors";
import ItemsLoading from "@/Components/ItemsLoading";
import BannerHero from "@/Components/BannerHero";
const CheckoutContext = React.createContext();
const CheckoutProvider = ({ children }) => {


	const [data, setData] = useRemember({
		date: sessions[0].date,
		tickets_quantity: {},
		code_promotion: "",
		event_slug: event.id,
		total: {
			sub_total: 0,
			total: 0,
			fee: 0
		}
	})

	return (
		<CheckoutContext.Provider value={{ data, setData }}>
			{children}
		</CheckoutContext.Provider>
	);


};

export const useCheckoutContext = () => {
	return useContext(CheckoutContext)

}

export default CheckoutProvider;


