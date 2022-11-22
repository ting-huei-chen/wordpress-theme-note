<!-- why using get? 1. get is faster 2. user can share the search result by copying the link  -->
<form action="<?php echo home_url('/'); ?>" method="get">
    <label for="search">
        <input type="search" name="s" id="s" size="15" placeholder="Search this website">
        <input type="submit" value="&#128269" id="searchbutton">
    </label>
</form>