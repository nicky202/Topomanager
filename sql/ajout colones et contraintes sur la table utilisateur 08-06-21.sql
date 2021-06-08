-- Column: public.utilisateur.valide

-- ALTER TABLE public.utilisateur DROP COLUMN valide;

ALTER TABLE public.utilisateur
    ADD COLUMN valide smallint;

COMMENT ON COLUMN public.utilisateur.valide
    IS '0 si non validé et 1 si validé';
	
-- Column: public.utilisateur.id_type_utilisateur

-- ALTER TABLE public.utilisateur DROP COLUMN id_type_utilisateur;

ALTER TABLE public.utilisateur
    ADD COLUMN id_type_utilisateur bigint;

COMMENT ON COLUMN public.utilisateur.id_type_utilisateur
    IS 'id du type d''utilisateur';
	
-- Constraint: fk_type_utilisateur

-- ALTER TABLE public.utilisateur DROP CONSTRAINT fk_type_utilisateur;

ALTER TABLE public.utilisateur
    ADD CONSTRAINT fk_type_utilisateur FOREIGN KEY (id_type_utilisateur)
    REFERENCES public.typeutilisateur (idtypeuser) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;
