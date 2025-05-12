"use client";

import React from "react";
import { useRouter } from "next/navigation";
import styles from "./Header.module.css";

type HeaderProps = {
    label: string;
    backgroundColorHex?: string;
    color?: string;
    backButton?: boolean;
}

export default function Header({label,backgroundColorHex, color, backButton}: HeaderProps) {
    const router = useRouter();
    const back = () => {
        router.back();
        console.log("back");
    };

    return (
        <header className={styles.header} style={{ backgroundColor: backgroundColorHex }}>
            {backButton &&  <span className={styles.back} onClick={back}>
                <i style={{borderColor: color}} className={styles.arrow}></i>
            </span>}
            <h1 style={{color: color}} className={styles.mainTitle}>{label}</h1>
        </header>
    );
}