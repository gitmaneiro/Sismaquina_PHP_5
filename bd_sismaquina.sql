--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.22
-- Dumped by pg_dump version 9.1.22
-- Started on 2016-07-13 14:50:40 VET

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1902 (class 1262 OID 78252)
-- Dependencies: 1901
-- Name: sismaquina; Type: COMMENT; Schema: -; Owner: sismaquina_user
--

COMMENT ON DATABASE sismaquina IS 'Base de datos sistema SISMAQUINA';


--
-- TOC entry 1 (class 3079 OID 11644)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1905 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 163 (class 1259 OID 86445)
-- Dependencies: 6
-- Name: equipos; Type: TABLE; Schema: public; Owner: sismaquina_user; Tablespace: 
--

CREATE TABLE equipos (
    id bigint NOT NULL,
    nombre_corto character varying(250),
    descripcion character varying(1000),
    produccion double precision,
    observaciones character varying(1000)
);


ALTER TABLE public.equipos OWNER TO sismaquina_user;

--
-- TOC entry 1906 (class 0 OID 0)
-- Dependencies: 163
-- Name: TABLE equipos; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON TABLE equipos IS 'Equipos que serán objeto de estudio de mantenimiento.';


--
-- TOC entry 1907 (class 0 OID 0)
-- Dependencies: 163
-- Name: COLUMN equipos.id; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN equipos.id IS 'Indice de la tabla.';


--
-- TOC entry 1908 (class 0 OID 0)
-- Dependencies: 163
-- Name: COLUMN equipos.nombre_corto; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN equipos.nombre_corto IS 'Nombre del Equipo: Nombre corto del equipo.';


--
-- TOC entry 1909 (class 0 OID 0)
-- Dependencies: 163
-- Name: COLUMN equipos.descripcion; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN equipos.descripcion IS 'Descripción: Características del equipo.';


--
-- TOC entry 1910 (class 0 OID 0)
-- Dependencies: 163
-- Name: COLUMN equipos.produccion; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN equipos.produccion IS 'Producción Asociada: Producción en Bls/día asociada al equipo.';


--
-- TOC entry 1911 (class 0 OID 0)
-- Dependencies: 163
-- Name: COLUMN equipos.observaciones; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN equipos.observaciones IS 'Observacoiones Generales: Otras características o aspectos relevantes al uso o ubicación del equipo.';


--
-- TOC entry 162 (class 1259 OID 86443)
-- Dependencies: 6 163
-- Name: equipos_id_seq; Type: SEQUENCE; Schema: public; Owner: sismaquina_user
--

CREATE SEQUENCE equipos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.equipos_id_seq OWNER TO sismaquina_user;

--
-- TOC entry 1912 (class 0 OID 0)
-- Dependencies: 162
-- Name: equipos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sismaquina_user
--

ALTER SEQUENCE equipos_id_seq OWNED BY equipos.id;


--
-- TOC entry 165 (class 1259 OID 86456)
-- Dependencies: 6
-- Name: eventos; Type: TABLE; Schema: public; Owner: sismaquina_user; Tablespace: 
--

CREATE TABLE eventos (
    id bigint NOT NULL,
    equipo bigint,
    fecha_falla timestamp without time zone,
    fecha_ejecucion timestamp without time zone,
    tipo_falla bigint,
    observaciones character varying(1000),
    usuario bigint
);


ALTER TABLE public.eventos OWNER TO sismaquina_user;

--
-- TOC entry 1913 (class 0 OID 0)
-- Dependencies: 165
-- Name: TABLE eventos; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON TABLE eventos IS 'Eventos de paro asociados a la tabla equipos';


--
-- TOC entry 1914 (class 0 OID 0)
-- Dependencies: 165
-- Name: COLUMN eventos.id; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN eventos.id IS 'Indice de la Tabla';


--
-- TOC entry 1915 (class 0 OID 0)
-- Dependencies: 165
-- Name: COLUMN eventos.equipo; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN eventos.equipo IS 'Id. equipo';


--
-- TOC entry 1916 (class 0 OID 0)
-- Dependencies: 165
-- Name: COLUMN eventos.fecha_falla; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN eventos.fecha_falla IS 'Fecha de la falla: Fecha y hora en la cual se da el evento de falla en el equipo.';


--
-- TOC entry 1917 (class 0 OID 0)
-- Dependencies: 165
-- Name: COLUMN eventos.fecha_ejecucion; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN eventos.fecha_ejecucion IS 'Fecha de ejecución: Fecha y hora en la cual se da la puesta en marcha al equipo.';


--
-- TOC entry 1918 (class 0 OID 0)
-- Dependencies: 165
-- Name: COLUMN eventos.tipo_falla; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN eventos.tipo_falla IS 'id tipo de falla.';


--
-- TOC entry 1919 (class 0 OID 0)
-- Dependencies: 165
-- Name: COLUMN eventos.observaciones; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN eventos.observaciones IS 'Observaciones: Características y otros aspectos relacionados al evento.';


--
-- TOC entry 1920 (class 0 OID 0)
-- Dependencies: 165
-- Name: COLUMN eventos.usuario; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN eventos.usuario IS 'id de usuario.';


--
-- TOC entry 164 (class 1259 OID 86454)
-- Dependencies: 6 165
-- Name: eventos_id_seq; Type: SEQUENCE; Schema: public; Owner: sismaquina_user
--

CREATE SEQUENCE eventos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.eventos_id_seq OWNER TO sismaquina_user;

--
-- TOC entry 1921 (class 0 OID 0)
-- Dependencies: 164
-- Name: eventos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sismaquina_user
--

ALTER SEQUENCE eventos_id_seq OWNED BY eventos.id;


--
-- TOC entry 169 (class 1259 OID 86478)
-- Dependencies: 6
-- Name: fallas; Type: TABLE; Schema: public; Owner: sismaquina_user; Tablespace: 
--

CREATE TABLE fallas (
    id bigint NOT NULL,
    nombre_falla character varying(500),
    detalles character varying(1000)
);


ALTER TABLE public.fallas OWNER TO sismaquina_user;

--
-- TOC entry 1922 (class 0 OID 0)
-- Dependencies: 169
-- Name: TABLE fallas; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON TABLE fallas IS 'Listado de posibles fallas de los equipos.';


--
-- TOC entry 1923 (class 0 OID 0)
-- Dependencies: 169
-- Name: COLUMN fallas.id; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN fallas.id IS 'Indice de la tabla de fallas.';


--
-- TOC entry 1924 (class 0 OID 0)
-- Dependencies: 169
-- Name: COLUMN fallas.nombre_falla; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN fallas.nombre_falla IS 'Nombre de la Falla: Nombre corto del tipo de falla asociada a un equipo.';


--
-- TOC entry 1925 (class 0 OID 0)
-- Dependencies: 169
-- Name: COLUMN fallas.detalles; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN fallas.detalles IS 'Dettales de la Falla: Aspectos y detalles relevantes a tomar en cuenta al momento de ocurrir el tipo de falla asociada.';


--
-- TOC entry 168 (class 1259 OID 86476)
-- Dependencies: 6 169
-- Name: fallas_id_seq; Type: SEQUENCE; Schema: public; Owner: sismaquina_user
--

CREATE SEQUENCE fallas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fallas_id_seq OWNER TO sismaquina_user;

--
-- TOC entry 1926 (class 0 OID 0)
-- Dependencies: 168
-- Name: fallas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sismaquina_user
--

ALTER SEQUENCE fallas_id_seq OWNED BY fallas.id;


--
-- TOC entry 167 (class 1259 OID 86467)
-- Dependencies: 6
-- Name: usuarios; Type: TABLE; Schema: public; Owner: sismaquina_user; Tablespace: 
--

CREATE TABLE usuarios (
    id bigint NOT NULL,
    indicador character varying(500),
    clave character varying(50)
);


ALTER TABLE public.usuarios OWNER TO sismaquina_user;

--
-- TOC entry 1927 (class 0 OID 0)
-- Dependencies: 167
-- Name: TABLE usuarios; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON TABLE usuarios IS 'Usuarios del sistema.';


--
-- TOC entry 1928 (class 0 OID 0)
-- Dependencies: 167
-- Name: COLUMN usuarios.id; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN usuarios.id IS 'Indice de la tabla.';


--
-- TOC entry 1929 (class 0 OID 0)
-- Dependencies: 167
-- Name: COLUMN usuarios.indicador; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN usuarios.indicador IS 'Indicador del usuario: Nombre de usuario del sistema.';


--
-- TOC entry 1930 (class 0 OID 0)
-- Dependencies: 167
-- Name: COLUMN usuarios.clave; Type: COMMENT; Schema: public; Owner: sismaquina_user
--

COMMENT ON COLUMN usuarios.clave IS 'Clave del Usuario: Palabra clave del usuario para acceder al sistema.';


--
-- TOC entry 166 (class 1259 OID 86465)
-- Dependencies: 167 6
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: sismaquina_user
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO sismaquina_user;

--
-- TOC entry 1931 (class 0 OID 0)
-- Dependencies: 166
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sismaquina_user
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- TOC entry 1773 (class 2604 OID 86448)
-- Dependencies: 163 162 163
-- Name: id; Type: DEFAULT; Schema: public; Owner: sismaquina_user
--

ALTER TABLE ONLY equipos ALTER COLUMN id SET DEFAULT nextval('equipos_id_seq'::regclass);


--
-- TOC entry 1774 (class 2604 OID 86459)
-- Dependencies: 164 165 165
-- Name: id; Type: DEFAULT; Schema: public; Owner: sismaquina_user
--

ALTER TABLE ONLY eventos ALTER COLUMN id SET DEFAULT nextval('eventos_id_seq'::regclass);


--
-- TOC entry 1776 (class 2604 OID 86481)
-- Dependencies: 169 168 169
-- Name: id; Type: DEFAULT; Schema: public; Owner: sismaquina_user
--

ALTER TABLE ONLY fallas ALTER COLUMN id SET DEFAULT nextval('fallas_id_seq'::regclass);


--
-- TOC entry 1775 (class 2604 OID 86470)
-- Dependencies: 167 166 167
-- Name: id; Type: DEFAULT; Schema: public; Owner: sismaquina_user
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- TOC entry 1890 (class 0 OID 86445)
-- Dependencies: 163 1897
-- Data for Name: equipos; Type: TABLE DATA; Schema: public; Owner: sismaquina_user
--



--
-- TOC entry 1932 (class 0 OID 0)
-- Dependencies: 162
-- Name: equipos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sismaquina_user
--

SELECT pg_catalog.setval('equipos_id_seq', 1, false);


--
-- TOC entry 1892 (class 0 OID 86456)
-- Dependencies: 165 1897
-- Data for Name: eventos; Type: TABLE DATA; Schema: public; Owner: sismaquina_user
--



--
-- TOC entry 1933 (class 0 OID 0)
-- Dependencies: 164
-- Name: eventos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sismaquina_user
--

SELECT pg_catalog.setval('eventos_id_seq', 1, false);


--
-- TOC entry 1896 (class 0 OID 86478)
-- Dependencies: 169 1897
-- Data for Name: fallas; Type: TABLE DATA; Schema: public; Owner: sismaquina_user
--



--
-- TOC entry 1934 (class 0 OID 0)
-- Dependencies: 168
-- Name: fallas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sismaquina_user
--

SELECT pg_catalog.setval('fallas_id_seq', 1, false);


--
-- TOC entry 1894 (class 0 OID 86467)
-- Dependencies: 167 1897
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: sismaquina_user
--



--
-- TOC entry 1935 (class 0 OID 0)
-- Dependencies: 166
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sismaquina_user
--

SELECT pg_catalog.setval('usuarios_id_seq', 1, false);


--
-- TOC entry 1778 (class 2606 OID 86453)
-- Dependencies: 163 163 1898
-- Name: id_equipos; Type: CONSTRAINT; Schema: public; Owner: sismaquina_user; Tablespace: 
--

ALTER TABLE ONLY equipos
    ADD CONSTRAINT id_equipos PRIMARY KEY (id);


--
-- TOC entry 1780 (class 2606 OID 86464)
-- Dependencies: 165 165 1898
-- Name: id_eventos; Type: CONSTRAINT; Schema: public; Owner: sismaquina_user; Tablespace: 
--

ALTER TABLE ONLY eventos
    ADD CONSTRAINT id_eventos PRIMARY KEY (id);


--
-- TOC entry 1784 (class 2606 OID 86486)
-- Dependencies: 169 169 1898
-- Name: id_fallas; Type: CONSTRAINT; Schema: public; Owner: sismaquina_user; Tablespace: 
--

ALTER TABLE ONLY fallas
    ADD CONSTRAINT id_fallas PRIMARY KEY (id);


--
-- TOC entry 1782 (class 2606 OID 86475)
-- Dependencies: 167 167 1898
-- Name: id_usuarios; Type: CONSTRAINT; Schema: public; Owner: sismaquina_user; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT id_usuarios PRIMARY KEY (id);


--
-- TOC entry 1785 (class 2606 OID 86592)
-- Dependencies: 163 165 1777 1898
-- Name: id_equipo_eventos; Type: FK CONSTRAINT; Schema: public; Owner: sismaquina_user
--

ALTER TABLE ONLY eventos
    ADD CONSTRAINT id_equipo_eventos FOREIGN KEY (equipo) REFERENCES equipos(id);


--
-- TOC entry 1786 (class 2606 OID 86597)
-- Dependencies: 169 165 1783 1898
-- Name: id_tipofalla_evento; Type: FK CONSTRAINT; Schema: public; Owner: sismaquina_user
--

ALTER TABLE ONLY eventos
    ADD CONSTRAINT id_tipofalla_evento FOREIGN KEY (tipo_falla) REFERENCES fallas(id);


--
-- TOC entry 1787 (class 2606 OID 86602)
-- Dependencies: 167 165 1781 1898
-- Name: id_usuario_evento; Type: FK CONSTRAINT; Schema: public; Owner: sismaquina_user
--

ALTER TABLE ONLY eventos
    ADD CONSTRAINT id_usuario_evento FOREIGN KEY (usuario) REFERENCES usuarios(id);


--
-- TOC entry 1904 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-07-13 14:50:41 VET

--
-- PostgreSQL database dump complete
--

