<table class="form-table">
    <tr>
        <th><?php _e("Choix de l'icone"); ?></th>
        <td>
            <select name="labs_choix_icone" id="labs_choix_icone">
                <!-- Maintenant que le tableau a été traité et renvoyé dans cette vue, on peut se servir de la clé devant laquelle on rajoute un '$' pour récupérer la valeur qui lui a été attribuée. -->
                <!-- On passe notre clé de $icone_choisi à $icone car on utilise une function compact dans ServicesDetailsMetabox qui elle génère une clé du même nom que la variable passée. -->
                <!-- On fait en sorte que l'option soit sélectionnée en fonction de la valeur récupérée dans la base de données. -->
                <option value="">--</option>

                <!-- <option <?php echo $icone == "flaticon-023-flask" ? 'selected' : '' ?> value="flaticon-023-flask">Test</option> -->

                <option value="flaticon-023-flask" <?php echo ($icone == "flaticon-023-flask" ? "selected" : ""); ?>>
                    <p>Potion</p>
                </option>
                <option value="flaticon-011-compass" <?php echo ($icone == "flaticon-011-compass" ? "selected" : ""); ?>>
                    <p>Compas</p>
                </option>
                <option value="flaticon-037-idea" <?php echo ($icone == "flaticon-037-idea" ? "selected" : ""); ?>>
                    <p>Idée</p>
                </option>
                <option value="flaticon-039-vector" <?php echo ($icone == "flaticon-039-vector" ? "selected" : ""); ?>>
                    <p>Vector</p>
                </option>
                <option value="flaticon-036-brainstorming" <?php echo ($icone == "flaticon-036-brainstorming" ? "selected" : ""); ?>>
                    <p>Brainstorming</p>
                </option>
                <option value="flaticon-026-search" <?php echo ($icone == "flaticon-026-search" ? "selected" : ""); ?>>
                    c <p>Search</p>
                </option>
                <option value="flaticon-018-laptop-1" <?php echo ($icone == "flaticon-018-laptop-1" ? "selected" : ""); ?>>
                    <p>Laptop</p>
                </option>
                <option value="flaticon-043-sketch" <?php echo ($icone == "flaticon-043-sketch" ? "selected" : ""); ?>>
                    <p>Sketch</p>
                </option>
                <option value="flaticon-012-cube" <?php echo ($icone == "flaticon-012-cube" ? "selected" : ""); ?>>
                    <p>Cube</p>
                </option>
                <option value="flaticon-002-caliper" <?php echo ($icone == "flaticon-002-caliper" ? "selected" : ""); ?>>
                    <p>Caliper</p>
                </option>
                <option value="flaticon-019-coffee-cup">
                    <p>Tasse de café</p>
                </option>
                <option value="flaticon-020-creativity" <?php echo ($icone == "flaticon-020-creativity" ? "selected" : ""); ?>>
                    <p>Créativité</p>
                </option>
                <option value="flaticon-025-imagination" <?php echo ($icone == "flaticon-025-imagination" ? "selected" : ""); ?>>
                    <p>Imagination</p>
                </option>
                <option value="flaticon-008-team" <?php echo ($icone == "flaticon-008-team" ? "selected" : ""); ?>>
                    <p>Team</p>
                </option>
            </select>
        </td>
    </tr>
</table>
