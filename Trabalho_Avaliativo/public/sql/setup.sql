--
-- PostgreSQL database dump
--

-- Dumped from database version 17.5
-- Dumped by pg_dump version 17.5

-- Started on 2025-12-02 21:22:18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE "feedbackSystem";
--
-- TOC entry 4888 (class 1262 OID 16844)
-- Name: feedbackSystem; Type: DATABASE; Schema: -; Owner: -
--

CREATE DATABASE "feedbackSystem" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Portuguese_Brazil.1252';


\connect "feedbackSystem"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 224 (class 1259 OID 16873)
-- Name: avaliacoes; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.avaliacoes (
    id_avaliacoes integer NOT NULL,
    id_dispositivo integer NOT NULL,
    id_pergunta integer NOT NULL,
    resposta smallint NOT NULL,
    feedback_textual text,
    data_hora timestamp with time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    CONSTRAINT avaliacoes_resposta_check CHECK (((resposta >= 0) AND (resposta <= 10)))
);


--
-- TOC entry 223 (class 1259 OID 16872)
-- Name: avaliacoes_id_avaliacoes_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.avaliacoes_id_avaliacoes_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 4889 (class 0 OID 0)
-- Dependencies: 223
-- Name: avaliacoes_id_avaliacoes_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.avaliacoes_id_avaliacoes_seq OWNED BY public.avaliacoes.id_avaliacoes;


--
-- TOC entry 220 (class 1259 OID 16855)
-- Name: dispositivos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.dispositivos (
    id_dispositivo integer NOT NULL,
    nome_dispositivo character varying(255) NOT NULL,
    setor character varying(150) NOT NULL,
    status integer DEFAULT 1 NOT NULL
);


--
-- TOC entry 219 (class 1259 OID 16854)
-- Name: dispositivos_id_dispositivo_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.dispositivos_id_dispositivo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 4890 (class 0 OID 0)
-- Dependencies: 219
-- Name: dispositivos_id_dispositivo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.dispositivos_id_dispositivo_seq OWNED BY public.dispositivos.id_dispositivo;


--
-- TOC entry 222 (class 1259 OID 16863)
-- Name: perguntas; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.perguntas (
    id_pergunta integer NOT NULL,
    texto_pergunta text NOT NULL,
    status integer DEFAULT 1 NOT NULL,
    setor character varying(150)
);


--
-- TOC entry 221 (class 1259 OID 16862)
-- Name: perguntas_id_pergunta_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.perguntas_id_pergunta_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 4891 (class 0 OID 0)
-- Dependencies: 221
-- Name: perguntas_id_pergunta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.perguntas_id_pergunta_seq OWNED BY public.perguntas.id_pergunta;


--
-- TOC entry 218 (class 1259 OID 16846)
-- Name: usuarios_admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.usuarios_admin (
    id_usuario integer NOT NULL,
    login character varying(100) NOT NULL,
    senha character varying(255) NOT NULL,
    nome character varying(100)
);


--
-- TOC entry 217 (class 1259 OID 16845)
-- Name: usuarios_admin_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.usuarios_admin_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 4892 (class 0 OID 0)
-- Dependencies: 217
-- Name: usuarios_admin_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.usuarios_admin_id_usuario_seq OWNED BY public.usuarios_admin.id_usuario;


--
-- TOC entry 4715 (class 2604 OID 16876)
-- Name: avaliacoes id_avaliacoes; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.avaliacoes ALTER COLUMN id_avaliacoes SET DEFAULT nextval('public.avaliacoes_id_avaliacoes_seq'::regclass);


--
-- TOC entry 4711 (class 2604 OID 16858)
-- Name: dispositivos id_dispositivo; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.dispositivos ALTER COLUMN id_dispositivo SET DEFAULT nextval('public.dispositivos_id_dispositivo_seq'::regclass);


--
-- TOC entry 4713 (class 2604 OID 16866)
-- Name: perguntas id_pergunta; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perguntas ALTER COLUMN id_pergunta SET DEFAULT nextval('public.perguntas_id_pergunta_seq'::regclass);


--
-- TOC entry 4710 (class 2604 OID 16849)
-- Name: usuarios_admin id_usuario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuarios_admin ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_admin_id_usuario_seq'::regclass);


--
-- TOC entry 4882 (class 0 OID 16873)
-- Dependencies: 224
-- Data for Name: avaliacoes; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.avaliacoes VALUES (6, 1, 1, 10, 'Testes segunda tentativa', '2025-11-08 19:18:04.260867-03');
INSERT INTO public.avaliacoes VALUES (7, 1, 2, 0, 'Testes segunda tentativa', '2025-11-08 19:18:04.26684-03');
INSERT INTO public.avaliacoes VALUES (8, 1, 1, 10, NULL, '2025-11-09 09:30:43.310458-03');
INSERT INTO public.avaliacoes VALUES (9, 1, 2, 1, NULL, '2025-11-09 09:30:43.320839-03');
INSERT INTO public.avaliacoes VALUES (10, 1, 1, 10, NULL, '2025-11-09 09:31:18.933857-03');
INSERT INTO public.avaliacoes VALUES (11, 1, 2, 1, NULL, '2025-11-09 09:31:18.941719-03');
INSERT INTO public.avaliacoes VALUES (12, 1, 1, 10, 'teste ', '2025-11-09 09:34:47.606312-03');
INSERT INTO public.avaliacoes VALUES (13, 1, 2, 0, 'teste ', '2025-11-09 09:34:47.6108-03');
INSERT INTO public.avaliacoes VALUES (14, 1, 1, 5, 'Teste redirecionar.......1', '2025-11-09 09:41:36.286849-03');
INSERT INTO public.avaliacoes VALUES (15, 1, 2, 1, 'Teste redirecionar.......1', '2025-11-09 09:41:36.296486-03');
INSERT INTO public.avaliacoes VALUES (16, 1, 1, 9, '2, 9', '2025-11-09 09:46:40.411203-03');
INSERT INTO public.avaliacoes VALUES (17, 1, 2, 2, '2, 9', '2025-11-09 09:46:40.414423-03');
INSERT INTO public.avaliacoes VALUES (18, 1, 1, 10, '10', '2025-11-09 11:00:35.549687-03');
INSERT INTO public.avaliacoes VALUES (19, 1, 2, 10, '10', '2025-11-09 11:00:36.638231-03');
INSERT INTO public.avaliacoes VALUES (20, 1, 1, 0, 'teste anônimo. ', '2025-11-12 06:59:43.898517-03');
INSERT INTO public.avaliacoes VALUES (21, 1, 2, 10, 'teste anônimo. ', '2025-11-12 06:59:43.91884-03');
INSERT INTO public.avaliacoes VALUES (22, 1, 1, 10, 'Somente Testes', '2025-11-13 18:48:25.781665-03');
INSERT INTO public.avaliacoes VALUES (23, 1, 2, 8, 'Somente Testes', '2025-11-13 18:48:25.805199-03');
INSERT INTO public.avaliacoes VALUES (24, 1, 1, 8, 'tese', '2025-11-13 21:05:45.692224-03');
INSERT INTO public.avaliacoes VALUES (25, 1, 2, 9, 'tese', '2025-11-13 21:05:45.705844-03');
INSERT INTO public.avaliacoes VALUES (26, 1, 1, 10, '', '2025-11-20 08:42:38.41536-03');
INSERT INTO public.avaliacoes VALUES (27, 1, 2, 2, '', '2025-11-20 08:42:38.446731-03');
INSERT INTO public.avaliacoes VALUES (28, 1, 1, 10, '123', '2025-11-20 16:10:11.172504-03');
INSERT INTO public.avaliacoes VALUES (29, 1, 2, 7, '123', '2025-11-20 16:10:11.182359-03');
INSERT INTO public.avaliacoes VALUES (30, 1, 1, 2, '', '2025-11-20 16:12:46.846991-03');
INSERT INTO public.avaliacoes VALUES (31, 1, 2, 9, '', '2025-11-20 16:12:46.851568-03');
INSERT INTO public.avaliacoes VALUES (32, 1, 1, 10, '', '2025-11-20 16:13:55.695341-03');
INSERT INTO public.avaliacoes VALUES (33, 1, 2, 9, '', '2025-11-20 16:13:55.69946-03');
INSERT INTO public.avaliacoes VALUES (34, 2, 2, 6, 'Poucas palavras', '2025-11-30 21:16:32.579896-03');
INSERT INTO public.avaliacoes VALUES (35, 2, 3, 9, 'Poucas palavras', '2025-11-30 21:16:32.615275-03');
INSERT INTO public.avaliacoes VALUES (36, 2, 4, 9, 'Poucas palavras', '2025-11-30 21:16:32.616373-03');
INSERT INTO public.avaliacoes VALUES (37, 1, 1, 9, 'Teste', '2025-12-02 07:01:54.08593-03');


--
-- TOC entry 4878 (class 0 OID 16855)
-- Dependencies: 220
-- Data for Name: dispositivos; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.dispositivos VALUES (1, 'DISPOSITIVO TESTE?', 'Banheiro', 1);
INSERT INTO public.dispositivos VALUES (2, 'Dispositivo 02', 'Geral', 1);


--
-- TOC entry 4880 (class 0 OID 16863)
-- Dependencies: 222
-- Data for Name: perguntas; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.perguntas VALUES (2, 'Está é a segunda pergunta?', 1, 'Geral');
INSERT INTO public.perguntas VALUES (3, 'Teste criando a pergunta...', 1, 'Geral');
INSERT INTO public.perguntas VALUES (1, 'Teste edição?', 1, 'Banheiro');
INSERT INTO public.perguntas VALUES (4, 'Esta seria a quarta pergunta??', 0, 'Geral');


--
-- TOC entry 4876 (class 0 OID 16846)
-- Dependencies: 218
-- Data for Name: usuarios_admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.usuarios_admin VALUES (2, 'newsmateus@gmail.com', '$2y$10$q/9kBR5PYeEgESzYkRzcMuRGZGBgRyBK0TBt4xoSvS.0fURvSI6vK', 'Mateus Oliveira');
INSERT INTO public.usuarios_admin VALUES (1, 'teste@exemple.com.br', '$2y$10$q/9kBR5PYeEgESzYkRzcMuRGZGBgRyBK0TBt4xoSvS.0fURvSI6vK', 'Mateus Vinicios de Oliveira');


--
-- TOC entry 4893 (class 0 OID 0)
-- Dependencies: 223
-- Name: avaliacoes_id_avaliacoes_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.avaliacoes_id_avaliacoes_seq', 37, true);


--
-- TOC entry 4894 (class 0 OID 0)
-- Dependencies: 219
-- Name: dispositivos_id_dispositivo_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.dispositivos_id_dispositivo_seq', 2, true);


--
-- TOC entry 4895 (class 0 OID 0)
-- Dependencies: 221
-- Name: perguntas_id_pergunta_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.perguntas_id_pergunta_seq', 5, true);


--
-- TOC entry 4896 (class 0 OID 0)
-- Dependencies: 217
-- Name: usuarios_admin_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.usuarios_admin_id_usuario_seq', 2, true);


--
-- TOC entry 4727 (class 2606 OID 16882)
-- Name: avaliacoes avaliacoes_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.avaliacoes
    ADD CONSTRAINT avaliacoes_pkey PRIMARY KEY (id_avaliacoes);


--
-- TOC entry 4723 (class 2606 OID 16861)
-- Name: dispositivos dispositivos_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.dispositivos
    ADD CONSTRAINT dispositivos_pkey PRIMARY KEY (id_dispositivo);


--
-- TOC entry 4725 (class 2606 OID 16871)
-- Name: perguntas perguntas_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perguntas
    ADD CONSTRAINT perguntas_pkey PRIMARY KEY (id_pergunta);


--
-- TOC entry 4719 (class 2606 OID 16853)
-- Name: usuarios_admin usuarios_admin_login_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuarios_admin
    ADD CONSTRAINT usuarios_admin_login_key UNIQUE (login);


--
-- TOC entry 4721 (class 2606 OID 16851)
-- Name: usuarios_admin usuarios_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuarios_admin
    ADD CONSTRAINT usuarios_admin_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 4728 (class 2606 OID 16883)
-- Name: avaliacoes avaliacoes_id_dispositivo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.avaliacoes
    ADD CONSTRAINT avaliacoes_id_dispositivo_fkey FOREIGN KEY (id_dispositivo) REFERENCES public.dispositivos(id_dispositivo);


--
-- TOC entry 4729 (class 2606 OID 16888)
-- Name: avaliacoes avaliacoes_id_pergunta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.avaliacoes
    ADD CONSTRAINT avaliacoes_id_pergunta_fkey FOREIGN KEY (id_pergunta) REFERENCES public.perguntas(id_pergunta);


-- Completed on 2025-12-02 21:22:18

--
-- PostgreSQL database dump complete
--

