# NISRA CTF Challenge Archive
NISRA CTF 題庫 source code

## Requirement
- docker
- docker-compose
- Python 3

## 建立一個新題目
1. 在 `src` 資料夾中新增題目資料夾，命名規則：開頭大寫，不可有空白
2. 在 `docker-compose.yml` 中新增題目資訊，必要標籤有：
    0. **非必要不要使用 `build` 創建題目**
    1. `build`：題目相對路徑
    2. `image`：映像檔名稱，命名規則：僅可小寫，不可有空白
    3. `container_name`：容器名稱，同 `image`，命名規則：僅可小寫，不可有空白
    4. `restart`：皆設定為 always
    5. `ports`：需要對應的連接埠（每種類別有屬於自己的 port range，請照結尾順序下去）
    6. `depends_on`: 需等待其他題目啟動後才開啟，這裡用來限制一次同時開啟題目的數量避免伺服器卡住。
    7. 其他標籤參閱 [官方文件](https://github.com/compose-spec/compose-spec/blob/master/spec.md)