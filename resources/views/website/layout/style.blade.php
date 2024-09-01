<!-- ========== Start Stylesheet ========== -->
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/css/media.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/css/about.css') }}" rel="stylesheet" />
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

<style>
  .pagination-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
}

.pagination-info,
.pagination-dropdown,
.pagination-links {
    flex: 1;
}

.pagination {
  display: flex;
  justify-content: center;
}

.pagination a {
  padding: 8px 16px;
  margin: 0 5px;
  border: 1px solid var(--blue-color);
  color: var(--blue-color);
  text-decoration: none;
  border-radius: 4px;
  cursor: pointer;
}
.pagination .active {
  background-color: var(--blue-color);
  color: var(--white-color);
  padding: 7px 16px;
  margin: 0 5px; 
  margin-top: -6px;
  border-radius: 4px;
}

.npc_pagination a:hover {
  background-color: var(--blue-color);
  color: var(--white-color);
}
</style>