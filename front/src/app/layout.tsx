import type { Metadata } from "next";
import "./reset.css";
import "./globals.css";
import React from "react";
import { Roboto } from 'next/font/google'

const roboto = Roboto({
  weight: '400',
  subsets: ['latin'],
})

export const metadata: Metadata = {
  title: "Coffee Machine",
  description: "Connected coffee machine",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="fr" className={roboto.className}>
      <body>
        {children}
      </body>
    </html>
  );
}
