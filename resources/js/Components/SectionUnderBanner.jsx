import React from "react";

const SectionUnderBanner = ({ children }) => {
	return (
		<div className="bg-primary-700">
			<div className="container relative py-12 ">{children}</div>
		</div>
	);
};

export default SectionUnderBanner;
