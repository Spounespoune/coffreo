import styles from "@/app/page.module.css";
import React from "react";

export default function CoffeeMachineStatus() {
    const coffeeMachineStatus = false;
    return (
        <div className={styles.status}>
            <h2>Status</h2>
            <span>
                        <i className={`${styles.indicator} ${coffeeMachineStatus ? styles.indicatorOn : styles.indicatorOff}`}></i>
                {coffeeMachineStatus ? "En fonction" : "Éteinte"}
                    </span>
        </div>
    )
}