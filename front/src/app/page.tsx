import Image from "next/image";
import Link from "next/link";
import Header from "../components/Header";
import CoffeeMachineStatus from "../components/CoffeeMachineStatus";
import styles from "./page.module.css";
import React from "react";

export default function Home() {
  return (
    <>
        <Header label="Coffreo" />
        <main>
            <div className={styles.coffeeMachine}>
                <Image
                    src="/coffee_machine.png"
                    alt="coffee"
                    width={180}
                    height={200}
                />
                <CoffeeMachineStatus />
            </div>
            <div className={styles.action}>
                <Link className='btn' href="/configuration">Configuration</Link>
                <Link className='btn' href="/configuration">Préparation</Link>
                <Link className='btn' href="/historical">Historique</Link>
            </div>
        </main>
    </>
  );
}
