CREATE TABLE "user" (
    "id" INTEGER NOT NULL,
    "name" VARCHAR(200) NOT NULL DEFAULT '',
    "created_time" TIMESTAMP NOT NULL,
    "modified_time" TIMESTAMP NOT NULL,
    "is_deleted" INTEGER NOT NULL DEFAULT '0',
    PRIMARY KEY ("id")
)
;
COMMENT ON COLUMN "user"."id" IS '';
COMMENT ON COLUMN "user"."name" IS '名字';
COMMENT ON COLUMN "user"."created_time" IS '创建时间';
COMMENT ON COLUMN "user"."modified_time" IS '修改时间';
COMMENT ON COLUMN "user"."is_deleted" IS '是否已删除，0-否，id-是';

ALTER TABLE `public`.`user`
    ALTER COLUMN `id` ADD GENERATED ALWAYS AS IDENTITY;
