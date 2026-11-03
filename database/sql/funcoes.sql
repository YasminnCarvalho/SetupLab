CREATE OR REPLACE FUNCTION fn_calcular_total_montagem(p_montagem_id BIGINT)
RETURNS NUMERIC(12,2)
LANGUAGE plpgsql
AS $$
DECLARE
    v_total NUMERIC(12,2);
BEGIN
    SELECT COALESCE(SUM(quantidade * preco_unitario), 0)
    INTO v_total
    FROM montagem_componentes
    WHERE montagem_id = p_montagem_id;

    RETURN v_total;
END;
$$;

CREATE OR REPLACE FUNCTION fn_componente_disponivel(
    p_componente_id BIGINT,
    p_quantidade INTEGER
)
RETURNS BOOLEAN
LANGUAGE plpgsql
AS $$
DECLARE
    v_estoque INTEGER;
BEGIN
    SELECT estoque
    INTO v_estoque
    FROM componentes
    WHERE id = p_componente_id
      AND ativo = TRUE;

    IF NOT FOUND OR p_quantidade <= 0 THEN
        RETURN FALSE;
    END IF;

    RETURN v_estoque >= p_quantidade;
END;
$$;
