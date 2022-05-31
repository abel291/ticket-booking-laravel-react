import SectionHeader from "@/Components/SectionHeader";
import { Disclosure, Transition } from "@headlessui/react";
import React from "react";
import { FaAngleDown } from "react-icons/fa";

const AskedQuestions = () => {
    const header = {
        subTitle: "¿CÓMO PODEMOS AYUDAR?",
        title: "PREGUNTAS FRECUENTES",
        text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque nemo dolore deserunt molestias consequatur placeat qui aliquam pariatur ea provident nesciunt, praesentium beatae illum similique, odio architecto at rem dignissimos.",
    };

    return (
        <div className="py-section">
            <SectionHeader
                subTitle="¿CÓMO PODEMOS AYUDAR?"
                title="PREGUNTAS FRECUENTES"
                text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque nemo dolore deserunt molestias consequatur placeat qui aliquam pariatur ea provident nesciunt, praesentium beatae illum similique, odio architecto at rem dignissimos."
            />
            <div className="mx-auto mt-14 max-w-3xl space-y-3">
                <Faq question="¿Puedo actualizar mis boletos después de realizar un pedido?">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Accusantium neque corrupti quo pariatur odio, ea est
                        dicta doloremque ducimus cumque sed reiciendis quaerat,
                        modi hic, nostrum ullam labore voluptate tempora.
                    </p>
                    <p className="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Nobis natus dignissimos blanditiis? Assumenda,
                        vitae.
                    </p>
                </Faq>

                <Faq question="¿Por qué cambió el método de entrega de mis boletos?">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Accusantium neque corrupti quo pariatur odio, ea est
                        dicta doloremque ducimus cumque sed reiciendis quaerat,
                        modi hic, nostrum ullam labore voluptate tempora.
                    </p>
                    <p className="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Nobis natus dignissimos blanditiis? Assumenda,
                        vitae.
                    </p>
                </Faq>
                <Faq question="¿Por qué hay un nombre diferente impreso en las entradas y esto me dará problemas en mi evento?">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Accusantium neque corrupti quo pariatur odio, ea est
                        dicta doloremque ducimus cumque sed reiciendis quaerat,
                        modi hic, nostrum ullam labore voluptate tempora.
                    </p>
                    <p className="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Nobis natus dignissimos blanditiis? Assumenda,
                        vitae.
                    </p>
                </Faq>
                <Faq question="Mis boletos no son asientos consecutivos, ¿todavía están garantizados juntos?">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Accusantium neque corrupti quo pariatur odio, ea est
                        dicta doloremque ducimus cumque sed reiciendis quaerat,
                        modi hic, nostrum ullam labore voluptate tempora.
                    </p>
                    <p className="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Nobis natus dignissimos blanditiis? Assumenda,
                        vitae.
                    </p>
                </Faq>
            </div>
        </div>
    );
};

const Faq = ({ question, children }) => {
    return (
        <Disclosure>
            {({ open }) => (
                <div className="w-full rounded-md bg-dark-blue-700 p-6">
                    <Disclosure.Button className="w-full">
                        <div className="flex items-center justify-between">
                            <h6 className="font-semibold">{question}</h6>
                            <FaAngleDown
                                className={`${
                                    open ? "rotate-180 transform" : ""
                                } ml-10 h-10 w-10 text-emerald-400 transition`}
                            />
                        </div>
                    </Disclosure.Button>

                    <Transition
                        enter="transition duration-100 ease-out"
                        enterFrom="transform scale-95 opacity-0"
                        enterTo="transform scale-100 opacity-100"
                        leave="transition duration-75 ease-out"
                        leaveFrom="transform scale-100 opacity-100"
                        leaveTo="transform scale-95 opacity-0"
                    >
                        <Disclosure.Panel className="mt-5 text-sm">
                            {children}
                        </Disclosure.Panel>
                    </Transition>
                </div>
            )}
        </Disclosure>
    );
};

export default AskedQuestions;
