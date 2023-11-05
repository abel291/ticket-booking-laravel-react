

const SelectQuantity = ({ quantity = 1, limit = 10, onChange = () => { } }) => {
	return (
		<>
			<div className="inline-flex items-stretch divide-x divide-primary-400 overflow-hidden rounded-full border border-primary-400 ">
				<button
					type="button"
					disabled={quantity <= 1}
					onClick={() => onChange(quantity - 1)}
					className=" flex items-center py-1 px-4   disabled:cursor-auto disabled:opacity-10"
				>
					{/* <FaMinus className="h-2 w-2 " /> */}
				</button>

				<div className=" py-2 px-5">{quantity}</div>

				<button
					type="button"
					disabled={quantity >= limit}
					onClick={() => onChange(quantity + 1)}
					className="flex items-center py-1 px-4   disabled:cursor-auto disabled:opacity-10"
				>
					{/* <FaPlus className="h-2 w-2" /> */}
				</button>
			</div>
		</>
		// <select value={quantity} className="w-full font-bold" onChange={onChange}>
		//     {optionValues}
		// </select>
	);
};

export default SelectQuantity;
