import React from "react";

export default function Button({
    type = "submit",
    className = "",
    processing = false,
    children,
    disabled = false,
    Icon = null,
    ...props
}) {
    return (
        <button
            type={type}
            className={
                "btn btn-primary relative disabled:opacity-50 " + className
            }
            disabled={processing || disabled}
            {...props}
        >
            {processing && (
                <div className="absolute inset-0 grid place-items-center">
                    <div>
                        <svg
                            className={" h-5 w-5 animate-spin"}
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                className="opacity-25"
                                cx="12"
                                cy="12"
                                r="10"
                                stroke="currentColor"
                                strokeWidth="4"
                            ></circle>
                            <path
                                className="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                            ></path>
                        </svg>
                    </div>
                </div>
            )}
            <div
                className={
                    (processing ? "invisible" : "") + " flex items-center"
                }
            >
                {Icon && <Icon className="w-4 h-4 mr-1.5" />}
                {children}
            </div>
        </button>
    );
}
