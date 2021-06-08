--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.11
-- Dumped by pg_dump version 9.6.11

-- Started on 2021-06-07 13:24:18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12387)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2185 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 189 (class 1259 OID 16568)
-- Name: dossier; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dossier (
    iddossier bigint NOT NULL,
    numdossier character varying(250),
    "RTX" character varying(250),
    numtitre character varying(250),
    indice character varying(250),
    nompropriete character varying(250),
    dateentree date
);


ALTER TABLE public.dossier OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 16574)
-- Name: dossier_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.dossier_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dossier_seq OWNER TO postgres;

--
-- TOC entry 2186 (class 0 OID 0)
-- Dependencies: 190
-- Name: dossier_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dossier_seq OWNED BY public.dossier.iddossier;


--
-- TOC entry 185 (class 1259 OID 16543)
-- Name: procedures; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.procedures (
    idproc bigint NOT NULL,
    numproc integer,
    labelproc character varying(250),
    delai integer
);


ALTER TABLE public.procedures OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16548)
-- Name: idproc_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.idproc_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.idproc_seq OWNER TO postgres;

--
-- TOC entry 2187 (class 0 OID 0)
-- Dependencies: 186
-- Name: idproc_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.idproc_seq OWNED BY public.procedures.idproc;


--
-- TOC entry 195 (class 1259 OID 16598)
-- Name: traitement_dossier; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.traitement_dossier (
    iddossier bigint,
    idutilisateur bigint,
    idtypetraitement bigint,
    dateenvoie date,
    datereception date,
    etatdossier character varying
);


ALTER TABLE public.traitement_dossier OWNER TO postgres;

--
-- TOC entry 2188 (class 0 OID 0)
-- Dependencies: 195
-- Name: TABLE traitement_dossier; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.traitement_dossier IS 'Table liant Dossier, utilisateur et traitement';


--
-- TOC entry 187 (class 1259 OID 16560)
-- Name: type_traitement; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.type_traitement (
    idtraitement bigint NOT NULL,
    labeltraitement character varying(250)
);


ALTER TABLE public.type_traitement OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16563)
-- Name: type_traitement_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.type_traitement_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.type_traitement_seq OWNER TO postgres;

--
-- TOC entry 2189 (class 0 OID 0)
-- Dependencies: 188
-- Name: type_traitement_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.type_traitement_seq OWNED BY public.type_traitement.idtraitement;


--
-- TOC entry 193 (class 1259 OID 16590)
-- Name: typeutilisateur; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.typeutilisateur (
    idtypeuser bigint NOT NULL,
    labeltype character varying(250)
);


ALTER TABLE public.typeutilisateur OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 16593)
-- Name: typeuser_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.typeuser_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.typeuser_seq OWNER TO postgres;

--
-- TOC entry 2190 (class 0 OID 0)
-- Dependencies: 194
-- Name: typeuser_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.typeuser_seq OWNED BY public.typeutilisateur.idtypeuser;


--
-- TOC entry 191 (class 1259 OID 16579)
-- Name: utilisateur; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.utilisateur (
    idutilisateur bigint NOT NULL,
    nom character varying(250),
    prenoms character varying(250),
    login character varying(250),
    password character varying(250),
    tel character varying(250),
    cin character varying(250),
    photo character varying(250),
    mail character varying(250)
);


ALTER TABLE public.utilisateur OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 16585)
-- Name: utilisateur_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.utilisateur_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.utilisateur_seq OWNER TO postgres;

--
-- TOC entry 2191 (class 0 OID 0)
-- Dependencies: 192
-- Name: utilisateur_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.utilisateur_seq OWNED BY public.utilisateur.idutilisateur;


--
-- TOC entry 2034 (class 2604 OID 16576)
-- Name: dossier iddossier; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dossier ALTER COLUMN iddossier SET DEFAULT nextval('public.dossier_seq'::regclass);


--
-- TOC entry 2032 (class 2604 OID 16550)
-- Name: procedures idproc; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.procedures ALTER COLUMN idproc SET DEFAULT nextval('public.idproc_seq'::regclass);


--
-- TOC entry 2033 (class 2604 OID 16565)
-- Name: type_traitement idtraitement; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.type_traitement ALTER COLUMN idtraitement SET DEFAULT nextval('public.type_traitement_seq'::regclass);


--
-- TOC entry 2036 (class 2604 OID 16595)
-- Name: typeutilisateur idtypeuser; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.typeutilisateur ALTER COLUMN idtypeuser SET DEFAULT nextval('public.typeuser_seq'::regclass);


--
-- TOC entry 2035 (class 2604 OID 16587)
-- Name: utilisateur idutilisateur; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.utilisateur ALTER COLUMN idutilisateur SET DEFAULT nextval('public.utilisateur_seq'::regclass);


--
-- TOC entry 2171 (class 0 OID 16568)
-- Dependencies: 189
-- Data for Name: dossier; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dossier (iddossier, numdossier, "RTX", numtitre, indice, nompropriete, dateentree) FROM stdin;
\.


--
-- TOC entry 2192 (class 0 OID 0)
-- Dependencies: 190
-- Name: dossier_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dossier_seq', 1, false);


--
-- TOC entry 2193 (class 0 OID 0)
-- Dependencies: 186
-- Name: idproc_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.idproc_seq', 11, true);


--
-- TOC entry 2167 (class 0 OID 16543)
-- Dependencies: 185
-- Data for Name: procedures; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.procedures (idproc, numproc, labelproc, delai) FROM stdin;
1	1	Accueil	1
2	2	Repérage	2
3	3	Caisse	3
4	4	Géomètre	1
5	5	Vérification	\N
6	6	Visa	\N
7	7	Satisfation des notes	\N
8	8	Vérificatioin avant remise	\N
9	9	Repérage definitif	\N
10	10	Insertion de données	\N
11	11	Remise	\N
\.


--
-- TOC entry 2177 (class 0 OID 16598)
-- Dependencies: 195
-- Data for Name: traitement_dossier; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.traitement_dossier (iddossier, idutilisateur, idtypetraitement, dateenvoie, datereception, etatdossier) FROM stdin;
\.


--
-- TOC entry 2169 (class 0 OID 16560)
-- Dependencies: 187
-- Data for Name: type_traitement; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.type_traitement (idtraitement, labeltraitement) FROM stdin;
1	Etablissement plan régulier / plan de localisation
2	Projet de morcellement /découpage/partage
3	Rétablissement de borne ou de limite
4	Rétablissement de borne et MAJ plans
5	Bornage transformation CF en titre
6	Bornage d’immatriculation/morcellement/morcellement-fusion/transformation de cadastre
7	Levée plan d’ensemble suivant recommandation CIRDOMA
8	Levée plan d’ensemble suivant demande de l’usager
9	Vérification de plans d’ensemble
10	Projet de traçage d’une servitude de passage
11	Inscription d’une servitude de passage avec implantation
12	Changement de nom ou titre
13	Inscription d’une servitude de passage
14	Attribution de nouveau numéro
15	Repérage :Second repérage, annulation des mentions de repérage, ou autres travaux lies au repérage 
16	Reproduction de plans
\.


--
-- TOC entry 2194 (class 0 OID 0)
-- Dependencies: 188
-- Name: type_traitement_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.type_traitement_seq', 16, true);


--
-- TOC entry 2195 (class 0 OID 0)
-- Dependencies: 194
-- Name: typeuser_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.typeuser_seq', 11, true);


--
-- TOC entry 2175 (class 0 OID 16590)
-- Dependencies: 193
-- Data for Name: typeutilisateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.typeutilisateur (idtypeuser, labeltype) FROM stdin;
1	SuperAdmin
2	SRT
3	Chef CIRTOPO
4	AgentAccueil
5	AgentRepérage
6	Caissier
7	Vérificateur
8	Archiviste
9	Secrétaire
10	Opérateur
11	Géomètre Expert
\.


--
-- TOC entry 2173 (class 0 OID 16579)
-- Dependencies: 191
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.utilisateur (idutilisateur, nom, prenoms, login, password, tel, cin, photo, mail) FROM stdin;
\.


--
-- TOC entry 2196 (class 0 OID 0)
-- Dependencies: 192
-- Name: utilisateur_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.utilisateur_seq', 1, false);


--
-- TOC entry 2042 (class 2606 OID 16578)
-- Name: dossier dossier_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dossier
    ADD CONSTRAINT dossier_pkey PRIMARY KEY (iddossier);


--
-- TOC entry 2038 (class 2606 OID 16552)
-- Name: procedures procedures_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.procedures
    ADD CONSTRAINT procedures_pkey PRIMARY KEY (idproc);


--
-- TOC entry 2040 (class 2606 OID 16567)
-- Name: type_traitement typet_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.type_traitement
    ADD CONSTRAINT typet_pkey PRIMARY KEY (idtraitement);


--
-- TOC entry 2046 (class 2606 OID 16597)
-- Name: typeutilisateur typeuser_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.typeutilisateur
    ADD CONSTRAINT typeuser_pkey PRIMARY KEY (idtypeuser);


--
-- TOC entry 2044 (class 2606 OID 16589)
-- Name: utilisateur utilisateur_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT utilisateur_pkey PRIMARY KEY (idutilisateur);


--
-- TOC entry 2047 (class 2606 OID 16601)
-- Name: traitement_dossier fk_dossier; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.traitement_dossier
    ADD CONSTRAINT fk_dossier FOREIGN KEY (iddossier) REFERENCES public.dossier(iddossier);


--
-- TOC entry 2049 (class 2606 OID 16611)
-- Name: traitement_dossier fk_type_traitement; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.traitement_dossier
    ADD CONSTRAINT fk_type_traitement FOREIGN KEY (idtypetraitement) REFERENCES public.type_traitement(idtraitement);


--
-- TOC entry 2048 (class 2606 OID 16606)
-- Name: traitement_dossier fk_utilisateur; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.traitement_dossier
    ADD CONSTRAINT fk_utilisateur FOREIGN KEY (idutilisateur) REFERENCES public.utilisateur(idutilisateur);


-- Completed on 2021-06-07 13:24:18

--
-- PostgreSQL database dump complete
--

