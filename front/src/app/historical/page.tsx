export default function Page() {
    const historicalOrder: Object[] = [
        {
            name:"test"
        },
        {
            name:"test2"
        },
        {
            name:"test3"
        }
    ];

    return (
        <div className="historical">
            <h1>Mes commandes de café</h1>
            <ul>
                {historicalOrder.map((item, index) => (
                    <li key={index}>{item.name}</li>
                ))}
            </ul>
        </div>
    )
}