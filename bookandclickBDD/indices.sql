-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2016 a las 19:06:33
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

-- SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
-- FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
-- WHERE REFERENCED_TABLE_SCHEMA = 'admincli_bdbookandclick'
-- AND REFERENCED_TABLE_NAME = 'click_article'
-- LIMIT 0 , 30


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla 'click_article'
--

ALTER TABLE 'click_article'
  ADD PRIMARY KEY ('id'), ADD KEY 'fk_article_author' ('author_id'), ADD KEY 'fk_article_updater' ('updater_id'), ADD KEY 'fk_article_category' ('category_id');

--
-- Indices de la tabla 'click_article_attachment'
--
ALTER TABLE 'click_article_attachment'
  ADD PRIMARY KEY ('id'), ADD KEY 'fk_article_attachment_article' ('article_id');

--
-- Indices de la tabla 'click_article_category'
--
ALTER TABLE 'click_article_category'
  ADD PRIMARY KEY ('id'), ADD KEY 'fk_article_category_section' ('parent_id');

--
-- Indices de la tabla 'click_calendar'
--
ALTER TABLE 'click_calendar'
  DROP PRIMARY KEY ('id');

ALTER TABLE 'click_calendar'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_calendar_event'
--
ALTER TABLE 'click_calendar_event'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_clients'
--
ALTER TABLE 'click_clients'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_file_storage_item'
--
ALTER TABLE 'click_file_storage_item'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_i18n_message'
--
ALTER TABLE 'click_i18n_message'
  ADD PRIMARY KEY ('id','language');

--
-- Indices de la tabla 'click_i18n_source_message'
--
ALTER TABLE 'click_i18n_source_message'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_key_storage_item'
--
ALTER TABLE 'click_key_storage_item'
  ADD PRIMARY KEY ('key'), ADD UNIQUE KEY 'idx_key_storage_item_key' ('key');

--
-- Indices de la tabla 'click_page'
--
ALTER TABLE 'click_page'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_planes'
--
ALTER TABLE 'click_planes'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_rbac_auth_assignment'
--
ALTER TABLE 'click_rbac_auth_assignment'
  ADD PRIMARY KEY ('item_name','user_id');

--
-- Indices de la tabla 'click_rbac_auth_item'
--
ALTER TABLE 'click_rbac_auth_item'
  ADD PRIMARY KEY ('name'), ADD KEY 'rule_name' ('rule_name'), ADD KEY 'idx-auth_item-type' ('type');

--
-- Indices de la tabla 'click_rbac_auth_item_child'
--
ALTER TABLE 'click_rbac_auth_item_child'
  ADD PRIMARY KEY ('parent','child'), ADD KEY 'child' ('child');

--
-- Indices de la tabla 'click_rbac_auth_rule'
--
ALTER TABLE 'click_rbac_auth_rule'
  ADD PRIMARY KEY ('name');

--
-- Indices de la tabla 'click_system_db_migration'
--
ALTER TABLE 'click_system_db_migration'
  ADD PRIMARY KEY ('version');

--
-- Indices de la tabla 'click_system_log'
--
ALTER TABLE 'click_system_log'
  ADD PRIMARY KEY ('id'), ADD KEY 'idx_log_level' ('level'), ADD KEY 'idx_log_category' ('category');

--
-- Indices de la tabla 'click_system_rbac_migration'
--
ALTER TABLE 'click_system_rbac_migration'
  ADD PRIMARY KEY ('version');

--
-- Indices de la tabla 'click_timeline_event'
--
ALTER TABLE 'click_timeline_event'
  ADD PRIMARY KEY ('id'), ADD KEY 'idx_created_at' ('created_at');

--
-- Indices de la tabla 'click_user'
--
ALTER TABLE 'click_user'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_user_profile'
--
ALTER TABLE 'click_user_profile'
  ADD PRIMARY KEY ('user_id');

--
-- Indices de la tabla 'click_widget_carousel'
--
ALTER TABLE 'click_widget_carousel'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_widget_carousel_item'
--
ALTER TABLE 'click_widget_carousel_item'
  ADD PRIMARY KEY ('id'), ADD KEY 'fk_item_carousel' ('carousel_id');

--
-- Indices de la tabla 'click_widget_menu'
--
ALTER TABLE 'click_widget_menu'
  ADD PRIMARY KEY ('id');

--
-- Indices de la tabla 'click_widget_text'
--
ALTER TABLE 'click_widget_text'
  ADD PRIMARY KEY ('id'), ADD KEY 'idx_widget_text_key' ('key');

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla 'click_article'
--
ALTER TABLE 'click_article'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla 'click_article_attachment'
--
ALTER TABLE 'click_article_attachment'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla 'click_article_category'
--
ALTER TABLE 'click_article_category'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla 'click_calendar'
--
ALTER TABLE 'click_calendar'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla 'click_clients'
--
ALTER TABLE 'click_clients'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla 'click_file_storage_item'
--
ALTER TABLE 'click_file_storage_item'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla 'click_i18n_source_message'
--
ALTER TABLE 'click_i18n_source_message'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla 'click_page'
--
ALTER TABLE 'click_page'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla 'click_planes'
--
ALTER TABLE 'click_planes'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla 'click_system_log'
--
ALTER TABLE 'click_system_log'
  MODIFY 'id' bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla 'click_timeline_event'
--
ALTER TABLE 'click_timeline_event'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla 'click_user'
--
ALTER TABLE 'click_user'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla 'click_user_profile'
--
ALTER TABLE 'click_user_profile'
  MODIFY 'user_id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla 'click_widget_carousel'
--
ALTER TABLE 'click_widget_carousel'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla 'click_widget_carousel_item'
--
ALTER TABLE 'click_widget_carousel_item'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla 'click_widget_menu'
--
ALTER TABLE 'click_widget_menu'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla 'click_widget_text'
--
ALTER TABLE 'click_widget_text'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla 'click_article'
--
ALTER TABLE 'click_article'
ADD CONSTRAINT 'fk_article_author' FOREIGN KEY ('author_id') REFERENCES 'click_user' ('id') ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT 'fk_article_category' FOREIGN KEY ('category_id') REFERENCES 'click_article_category' ('id') ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT 'fk_article_updater' FOREIGN KEY ('updater_id') REFERENCES 'click_user' ('id') ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla 'click_article_attachment'
--
ALTER TABLE 'click_article_attachment'
ADD CONSTRAINT 'fk_article_attachment_article' FOREIGN KEY ('article_id') REFERENCES 'click_article' ('id') ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla 'click_article_category'
--
ALTER TABLE 'click_article_category'
ADD CONSTRAINT 'fk_article_category_section' FOREIGN KEY ('parent_id') REFERENCES 'click_article_category' ('id') ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla 'click_i18n_message'
--
ALTER TABLE 'click_i18n_message'
ADD CONSTRAINT 'fk_i18n_message_source_message' FOREIGN KEY ('id') REFERENCES 'click_i18n_source_message' ('id') ON DELETE CASCADE;

--
-- Filtros para la tabla 'click_rbac_auth_assignment'
--
ALTER TABLE 'click_rbac_auth_assignment'
ADD CONSTRAINT 'click_rbac_auth_assignment_ibfk_1' FOREIGN KEY ('item_name') REFERENCES 'click_rbac_auth_item' ('name') ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla 'click_rbac_auth_item'
--
ALTER TABLE 'click_rbac_auth_item'
ADD CONSTRAINT 'click_rbac_auth_item_ibfk_1' FOREIGN KEY ('rule_name') REFERENCES 'click_rbac_auth_rule' ('name') ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla 'click_rbac_auth_item_child'
--
ALTER TABLE 'click_rbac_auth_item_child'
ADD CONSTRAINT 'click_rbac_auth_item_child_ibfk_1' FOREIGN KEY ('parent') REFERENCES 'click_rbac_auth_item' ('name') ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT 'click_rbac_auth_item_child_ibfk_2' FOREIGN KEY ('child') REFERENCES 'click_rbac_auth_item' ('name') ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla 'click_user_profile'
--
ALTER TABLE 'click_user_profile'
ADD CONSTRAINT 'fk_user' FOREIGN KEY ('user_id') REFERENCES 'click_user' ('id') ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla 'click_widget_carousel_item'
--
ALTER TABLE 'click_widget_carousel_item'
ADD CONSTRAINT 'fk_item_carousel' FOREIGN KEY ('carousel_id') REFERENCES 'click_widget_carousel' ('id') ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
