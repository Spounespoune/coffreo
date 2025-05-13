"use client"

import styles from "@/app/page.module.css";
import React, {useState, useEffect} from "react";

export default function CoffeeMachineStatus() {
    const [coffeeMachineStatus, setCoffeeMachineStatus] = useState('off');

    const statusLabels: Record<string, string> = {
        on: "En fonction",
        reset: "En veille",
        off: "Éteinte",
    };
    const indicatorClasses: Record<string, string> = {
        on: styles.indicatorOn,
        reset: styles.indicatorIdle,
        off: styles.indicatorOff,
    };

    useEffect(() => {
        const fetchInitialStatus = async () => {
            const res = await fetch('http://localhost:80/coffee-machine/state');
            const data = await res.json();
            setCoffeeMachineStatus(data);
            setupMercureConnection()
        };

        fetchInitialStatus();
    }, []);

    const setupMercureConnection = () => {
        try {
            const url = new URL('http://localhost:3001/.well-known/mercure');
            url.searchParams.append('topic', 'coffee-machine/status');

            const eventSource = new EventSource(url);

            eventSource.onmessage = (event) => {
                try {
                    const newStatus = JSON.parse(event.data);
                    console.log('Nouvelle mise à jour reçue:', newStatus);
                    setCoffeeMachineStatus(newStatus.status);
                } catch (error) {
                    console.error('Erreur lors du traitement des données Mercure:', error);
                }
            };

            eventSource.onerror = (error) => {
                console.error('Mercure : Erreur de connexion ', error);
            };
            return () => {
                eventSource.close();
            };
        } catch (error) {
            console.error('Mercure : Erreur lors de la configuration :', error);
        }
    };

    return (
        <div className={styles.status}>
            <h2>Status</h2>
            <span>
                <i className={`${styles.indicator} ${indicatorClasses[coffeeMachineStatus]}`}></i>
                {statusLabels[coffeeMachineStatus]}
            </span>
        </div>
    )
}