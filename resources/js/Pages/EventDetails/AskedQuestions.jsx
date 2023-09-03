import FrequentlyAsked from "@/Components/FrequentlyAsked";
import SectionHeader from "@/Components/SectionHeader";

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
            <div className="mx-auto mt-14 max-w-4xl space-y-3">
                <FrequentlyAsked question="¿Puedo actualizar mis boletos después de realizar un pedido?">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Accusantium neque corrupti quo pariatur odio, ea est
                        dicta doloremque ducimus cumque sed reiciendis quaerat,
                        modi hic, nostrum ullam labore voluptate tempora.
                        modi hic, nostrum ullam labore voluptate tempora.
                    </p>
                    <p className="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Nobis natus dignissimos blanditiis? Assumenda,
                        vitae.
                    </p>
                </FrequentlyAsked>

                <FrequentlyAsked question="¿Por qué cambió el método de entrega de mis boletos?">
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
                </FrequentlyAsked>
                <FrequentlyAsked question="¿Por qué hay un nombre diferente impreso en las entradas y esto me dará problemas en mi evento?">
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
                </FrequentlyAsked>
                <FrequentlyAsked question="Mis boletos no son asientos consecutivos, ¿todavía están garantizados juntos?">
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
                </FrequentlyAsked>
            </div>
        </div>
    );
};



export default AskedQuestions;
