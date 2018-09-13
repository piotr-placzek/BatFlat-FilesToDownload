# FliesToDownload module for BatFlat

<p style="color:red">The module will be ready in a few days.</p>

## Version
1.0.0

## Requirements
Batflat 1.3.x

## Changelog
### 1.1.0
- A link to awesome fonts has been added in the admin panel.
- A preview link to the file has been added in the administration panel (file column).
- The administrative panel shows the entire tag for the given file (column slug -> column tag).
- A default value has been added in the new file icon field: download.

## How to install
1. Download this repository
2. Unzip the downloaded files
3. Move catalog with theme to the `/inc/modules` 
4. Activate form modules admin panel

## Usage
Use the appropriate tag in the place where you want to place the file for download.

### Example
`{$pdev_ftd.my_file}` where `my_file` is the slug given to the file in the administration panel.