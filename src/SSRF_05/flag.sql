SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE IF NOT EXISTS `flag`;
USE `flag`;

-- ----------------------------
-- Table structure for flag_table
-- ----------------------------
DROP TABLE IF EXISTS `flag_table`;
CREATE TABLE `flag_table` (
  `flag` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of flag_table
-- ----------------------------
BEGIN;
INSERT INTO `flag_table` VALUES ('NISRA{LOL_SSRF2MYSQL!_LOL}');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
