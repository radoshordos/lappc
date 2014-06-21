CREATE PROCEDURE replase_into_tree_dev`(IN tree_id INT(10) UNSIGNED, dev_id INT(10) UNSIGNED)
BEGIN

    SET @xTree  = tree_id;
    SET @xDev   = dev_id;

    REPLACE INTO tree2dev SET
                        t2d_id_tree = @xTree,
                        t2d_id_dev = 0,
                        t2d_count_prod_dir_all     = (fce_select_beetwen(@xTree,1)),
                        t2d_count_prod_dir_visible = (fce_select_beetwen_visible(@xTree,1)),
                        t2d_count_prod_subdir_all  = (SELECT
                                                        CASE
                                                            WHEN (MOD(@xTree, 10000) = 0)
                                                                  THEN (fce_select_beetwen(@xTree,10000))
                                                            WHEN (MOD(@xTree, 100)   = 0)
                                                                  THEN (fce_select_beetwen(@xTree,100))
                                                            ELSE       (fce_select_beetwen(@xTree,1))
                                                        END
                        ),
                        t2d_count_prod_subdir_visible = (SELECT
                                                        CASE
                                                            WHEN (MOD(@xTree, 10000) = 0)
                                                                  THEN (fce_select_beetwen_visible(@xTree,10000))
                                                            WHEN (MOD(@xTree, 100)   = 0)
                                                                  THEN (fce_select_beetwen_visible(@xTree,100))
                                                            ELSE       (fce_select_beetwen_visible(@xTree,1))
                                                        END
                );

    REPLACE INTO tree2dev SET
                        t2d_id_tree = @xTree,
                        t2d_id_dev = @xDev,
                        t2d_count_prod_dir_all     = (fce_select_beetwen_with_dev(@xTree,@xDev,1)),
                        t2d_count_prod_dir_visible = (fce_select_beetwen_with_dev_visible(@xTree,@xDev,1)),
                        t2d_count_prod_subdir_all  = (SELECT
                                                        CASE
                                                            WHEN (MOD(@xTree, 10000) = 0)
                                                                  THEN (fce_select_beetwen_with_dev(@xTree,@xDev,10000))
                                                            WHEN (MOD(@xTree, 100)   = 0)
                                                                  THEN (fce_select_beetwen_with_dev(@xTree,@xDev,100))
                                                            ELSE       (fce_select_beetwen_with_dev(@xTree,@xDev,1))
                                                        END
                        ),
                        t2d_count_prod_subdir_visible = (SELECT
                                                        CASE
                                                            WHEN (MOD(@xTree, 10000) = 0)
                                                                  THEN (fce_select_beetwen_with_dev_visible(@xTree,@xDev,10000))
                                                            WHEN (MOD(@xTree, 100)   = 0)
                                                                  THEN (fce_select_beetwen_with_dev_visible(@xTree,@xDev,100))
                                                            ELSE       (fce_select_beetwen_with_dev_visible(@xTree,@xDev,1))
                                                        END
                );

END

--
-- Funkce
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fce_select_beetwen`(`tree_id` INT(10) UNSIGNED, `rangex` SMALLINT(5) UNSIGNED) RETURNS smallint(5) unsigned
    DETERMINISTIC
BEGIN

	DECLARE run SMALLINT(5) UNSIGNED DEFAULT 0;

        IF (rangex) = 1 THEN

		SELECT COUNT(*) INTO RUN
                FROM prod
                WHERE  prod_id_tree = tree_id;

	ELSE

                SELECT COUNT(*)  INTO RUN
                FROM prod
                WHERE   prod_id_tree >= (tree_id - MOD(tree_id, rangex))
                AND     prod_id_tree <  (tree_id - MOD(tree_id, rangex)) + rangex;

	END IF;

	RETURN run;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fce_select_beetwen_visible`(`tree_id` INT(10) UNSIGNED, `rangex` SMALLINT(5) UNSIGNED) RETURNS smallint(5) unsigned
    DETERMINISTIC
BEGIN

	DECLARE run SMALLINT(5) UNSIGNED DEFAULT 0;

        IF (rangex) = 1 THEN

		SELECT COUNT(*) INTO RUN
                FROM prod
                WHERE  prod_id_tree = tree_id
                AND    prod_id_mode > 1;

	ELSE

                SELECT COUNT(*)  INTO RUN
                FROM prod
                WHERE   prod_id_tree >= (tree_id - MOD(tree_id, rangex))
                AND     prod_id_tree <  (tree_id - MOD(tree_id, rangex)) + rangex
                AND     prod_id_mode > 1;

	END IF;

RETURN run;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fce_select_beetwen_with_dev`(`tree_id` INT(10) UNSIGNED, `dev_id` SMALLINT(5) UNSIGNED, `rangex` SMALLINT(5) UNSIGNED) RETURNS smallint(5) unsigned
    DETERMINISTIC
BEGIN

	DECLARE run SMALLINT(5) UNSIGNED DEFAULT 0;

        IF (rangex) = 1 THEN

		SELECT COUNT(*) INTO RUN
                FROM prod
                WHERE   prod_id_dev  = dev_id
                AND     prod_id_tree = tree_id;

	ELSE

                SELECT COUNT(*)  INTO RUN
                FROM prod
                WHERE   prod_id_dev   = dev_id
                AND     prod_id_tree >= (tree_id - MOD(tree_id, rangex))
                AND     prod_id_tree <  (tree_id - MOD(tree_id, rangex)) + rangex;

	END IF;

	RETURN run;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fce_select_beetwen_with_dev_visible`(`tree_id` INT(10) UNSIGNED, `dev_id` SMALLINT(5) UNSIGNED, `rangex` SMALLINT(5) UNSIGNED) RETURNS smallint(5) unsigned
    DETERMINISTIC
BEGIN

	DECLARE run SMALLINT(5) UNSIGNED DEFAULT 0;

        IF (rangex) = 1 THEN

		SELECT COUNT(*) INTO RUN
                FROM prod
                WHERE   prod_id_dev  = dev_id
                AND     prod_id_tree = tree_id
                AND     prod_id_mode > 1;

	ELSE

                SELECT COUNT(*)  INTO RUN
                FROM prod
                WHERE   prod_id_dev   =  dev_id
                AND     prod_id_tree >= (tree_id - MOD(tree_id, rangex))
                AND     prod_id_tree <  (tree_id - MOD(tree_id, rangex)) + rangex
                AND     prod_id_mode > 1;

	END IF;

	RETURN run;

END$$

DELIMITER ;