CREATE OR REPLACE FUNCTION fn_atualizar_total_montagem()
RETURNS TRIGGER
LANGUAGE plpgsql
AS $$
BEGIN
    IF TG_OP = 'DELETE' THEN
        UPDATE montagens
        SET preco_total = fn_calcular_total_montagem(OLD.montagem_id)
        WHERE id = OLD.montagem_id;

        RETURN OLD;

    ELSIF TG_OP = 'UPDATE' THEN
        UPDATE montagens
        SET preco_total = fn_calcular_total_montagem(OLD.montagem_id)
        WHERE id = OLD.montagem_id;

        UPDATE montagens
        SET preco_total = fn_calcular_total_montagem(NEW.montagem_id)
        WHERE id = NEW.montagem_id;

        RETURN NEW;

    ELSE
        UPDATE montagens
        SET preco_total = fn_calcular_total_montagem(NEW.montagem_id)
        WHERE id = NEW.montagem_id;

        RETURN NEW;
    END IF;
END;
$$;

DROP TRIGGER IF EXISTS trg_atualizar_total_montagem ON montagem_componentes;
CREATE TRIGGER trg_atualizar_total_montagem
AFTER INSERT OR UPDATE OR DELETE
ON montagem_componentes
FOR EACH ROW
EXECUTE FUNCTION fn_atualizar_total_montagem();

CREATE OR REPLACE FUNCTION fn_atualizar_data_componente()
RETURNS TRIGGER
LANGUAGE plpgsql
AS $$
BEGIN
    NEW.updated_at = CURRENT_TIMESTAMP;
    RETURN NEW;
END;
$$;

DROP TRIGGER IF EXISTS trg_atualizar_data_componente ON componentes;
CREATE TRIGGER trg_atualizar_data_componente
BEFORE UPDATE
ON componentes
FOR EACH ROW
EXECUTE FUNCTION fn_atualizar_data_componente();
