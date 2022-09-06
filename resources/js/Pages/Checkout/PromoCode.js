import React from "react";
import Card from "@/Components/Card";
import Button from "@/Components/Button";
import Input from "@/Components/Input";
import { useForm, usePage } from "@inertiajs/inertia-react";
import { useState, useRef, useEffect } from "react";
const PromoCode = ({ data, setData,handleSubmit }) => {
	const promotions = usePage().props.promotions || [];
		
	const handleChange = (e) => {
		
		setData({ ...data, code_promotion: e.target.value })
		
	}
	return (
		<Card title="Codigo de Promocion">
			<div className="space-x-4">
				{promotions.map((item) => (
					<div key={item.id} className=" inline-block text-xs text-white">{item.code}</div>
				))}
			</div>
			<form onSubmit={handleSubmit} className="mb-3">
				<div className="mt-7 flex items-center gap-4">
					<input
						onChange={handleChange}
						defaultValue=""
						className="input w-full uppercase grow"
						required={true}
						name="code"
						placeholder="Codigo *"
					/>
					<div>
						<Button>
							Verificar
						</Button>
					</div>
				</div>
			</form>

		</Card>
	);
};

export default PromoCode;
