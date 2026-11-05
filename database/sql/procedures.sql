CREATE OR REPLACE PROCEDURE sp_atualizar_preco_componente(
    p_id BIGINT,
    p_novo_preco NUMERIC(12,2)
)
LANGUAGE plpgsql
AS $$
BEGIN
    IF p_novo_preco < 0 THEN
        RAISE EXCEPTION 'O preço não pode ser negativo';
    END IF;

    UPDATE componentes
    SET preco = p_novo_preco,
        updated_at = CURRENT_TIMESTAMP
    WHERE id = p_id;

    IF NOT FOUND THEN
        RAISE EXCEPTION 'Componente não encontrado';
    END IF;
END;
$$;

CREATE OR REPLACE PROCEDURE sp_definir_visibilidade_montagem(
    p_montagem_id BIGINT,
    p_publica BOOLEAN
)
LANGUAGE plpgsql
AS $$
BEGIN
    UPDATE montagens
    SET publica = p_publica,
        updated_at = CURRENT_TIMESTAMP
    WHERE id = p_montagem_id;

    IF NOT FOUND THEN
        RAISE EXCEPTION 'Montagem não encontrada';
    END IF;
END;
$$;
